<?php

namespace App\Http\Controllers\client\home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::where('active', 1)->orderBy('id', 'DESC')->get();

        $banners = Banner::where('active', 1)->take(3)->get();

        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            return view('client.pages.home', compact('products', 'cart', 'banners'));
        }
        return view('client.pages.home', compact('products', 'banners'));
    }
    public function detail($id)
    {
        $product = Product::with('category', 'images', 'brand', 'variant.varianAttributeValue.attribute', 'variant.varianAttributeValue.attributeValue', 'reviews.user')->where('id', $id)->first();
        // dd($product);
        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            return view('client.pages.detail', compact('product', 'cart'));
        }
        return view('client.pages.detail', compact('product'));
        // return response()->json($product);
    }


}
