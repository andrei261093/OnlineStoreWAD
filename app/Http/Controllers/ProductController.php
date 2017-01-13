<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Cart;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::paginate(15);;

        return view('shop.index', ['products' => $products]);
    }

    public function getCatProducts($cat_id)
    {
        $tvProducts = Product::where('categoryId', '=', $cat_id)->paginate(15);
        return view('shop.index', ['products' => $tvProducts]);
    }

    public function getTVProducts()
    {
        $tvProducts = Product::where('categoryId', '=', 1)->get();
        return view('shop.index', ['products' => $tvProducts]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('product.index');
    }

    public function getShoppingCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }


}
