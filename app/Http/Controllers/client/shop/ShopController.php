<?php

namespace App\Http\Controllers\client\shop;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index() {
        $products = Product::where('active', 1)->orderBy('id', 'DESC')->get();
    
        $categories = Category::withCount(['products' => function ($q) {
            $q->where('active', 1);
        }])->orderBy('id', 'DESC')->get();
    
        $data = [
            'products' => $products,
            'categories' => $categories,
        ];
    
        if (Auth::check()) {
            $data['cart'] = Cart::where('id_user', Auth::id())->get();
        }
    
        return view('client.pages.shop', $data);
    }    
    
}
