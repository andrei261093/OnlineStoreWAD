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

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart', $cart);
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart', $cart);
        }
        return redirect()->route('product.shoppingCart');
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

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    public function getVIews($id)
    {
        $product = Product::find($id);
        return view('shop.viewDetails',['product'=>$product]);
    }
    public function getHome()
    {
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('partials.home', ['products' => $products]);
    }
}
