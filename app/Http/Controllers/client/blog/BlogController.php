<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::where('id_user', auth()->user()->id)->get();
        $query = Post::where('status', 'published');
        $recentPosts = Post::where('status', 'published')->latest()->take(3)->get();
        $popularProducts = Product::latest()->take(3)->get();

        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                  ->orWhere('excerpt', 'like', '%' . $keyword . '%')
                  ->orWhere('content', 'like', '%' . $keyword . '%');
            });
        }
        
        if ($request->has('category')) {
            $category = PostCategory::where('slug', $request->category)->first();
            if ($category) {
                $query->where('post_category_id', $category->id);
            }
        }

        $posts = $query->latest()->get(); 
        $categories = PostCategory::withCount('posts')->get();

        return view('client.pages.blog', compact('cart','posts', 'categories','recentPosts','popularProducts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $categories = PostCategory::withCount('posts')->get();
        $recentPosts = Post::latest()->take(5)->get();
        $popularProducts = Product::latest()->take(3)->get();
        return view('client.pages.blog-detail', compact('post', 'categories', 'recentPosts', 'popularProducts'));
    }
}
