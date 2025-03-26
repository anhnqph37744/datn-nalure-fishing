<?php

namespace App\Http\Controllers\client\home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $products = Product::where('active', 1)->orderBy('id', 'DESC')->get();
        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            return view('client.pages.home', compact('products', 'cart'));
        }
        return view('client.pages.home', compact('products'));
    }
    public function detail($id)
    {
        $product = Product::with('category', 'images', 'brand', 'variant.varianAttributeValue.attribute', 'variant.varianAttributeValue.attributeValue')->where('id', $id)->first();
        // dd($product);
        if (Auth::check()) {
            $cart = Cart::where('id_user', Auth::id())->get();
            return view('client.pages.detail', compact('product', 'cart'));
        }
        return view('client.pages.detail', compact('product'));
        // return response()->json($product);
    }
}
