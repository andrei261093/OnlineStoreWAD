<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function autocomplete(Request $request){
        $products = Product::select("title as name")->where("title","LIKE","%{$request->input('query')}%")->take(10)->get();
        return response()->json($products);
    }

    public function search(Request $request){
        $products = Product::where("title","LIKE","%{$request->input('input')}%")->paginate(15);
        return view('shop.index', ['products' => $products]);;
    }

    public function adminSearch(Request $request){
        $products = Product::where("title","LIKE","%{$request->input('input')}%")->paginate(15);
        return view('shop.admin', ['products' => $products]);;
    }
    
}
