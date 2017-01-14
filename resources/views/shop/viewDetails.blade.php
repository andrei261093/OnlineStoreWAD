@extends('layouts.master')

@section('title')
    Iorga-Bercaru WAD 2016
@endsection

@section('content')
    <div class="media clearfix">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="{{$product->imagePath}}" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h1>Description:</h1>

            <h4 class="description">
                {{$product->longDescription}}
            </h4>
            <div class="clearfix">
                <a href="{{Route('product.addToCart', [$product->id])}}" class="btn btn-primary  btn-xs center" role="button">Add to Cart</a>

            </div>

        </div>
    </div>

@endsection