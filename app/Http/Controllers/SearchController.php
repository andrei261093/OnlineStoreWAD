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
}
