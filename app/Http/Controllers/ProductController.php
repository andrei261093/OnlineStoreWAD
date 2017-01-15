<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Order;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::paginate(15);

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
        $products = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('partials.home', ['products' => $products]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Comanda a fost inregistrata!');

    }

    public function resetCart(){
        Session::forget('cart');
        return redirect()->route('product.shoppingCart');
    }

    
    public function manageProducts(){
        $user = Auth::user();
        if($user->role === 1){
            $products = Product::orderBy('created_at', 'desc')->paginate(15);
            return view('shop.admin', ['products' => $products]);
        }
        return view('user.userNotAdmin');
    }

    public function getProductDelete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function getAddProduct(){
        $categories = Category::all();
        return view('shop.adminAddProduct', ['categories' => $categories]);
    }

    public function postAddProduct(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'longDescription' => 'required',
            'image' => 'required',
            'price' => 'required'
            
        ]);
        $product = new Product([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'longDescription' => $request->input('longDescription'),
            'price' => $request->input('price'),
            'categoryID' => $request->input('category'),
            'imagePath' => $request->input('image')
        ]);
        $product->save();

        return redirect()->route('adminPage');
    }

    public function getAddCategory(){
        $user = Auth::user();
        if($user->role === 1){
            $categories = Category::all();
            return view('shop.adminAddCategory', ['categories' => $categories]);
        }
        return view('user.userNotAdmin');
    }

    public function postAddCategory(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);
        $category = new Category([
            'name' => $request->input('name'),
        ]);
        
        $category->save();

        return redirect()->route('admin.categoryForm');
    }

    public function getCategoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

}
