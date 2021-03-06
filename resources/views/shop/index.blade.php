@extends('layouts.master')

@section('title')
Iorga-Bercaru WAD 2016
@endsection

@section('content')
    @foreach($products->chunk(5) as $productChunk)
        <div class="row center-block clearfix">
            @foreach($productChunk as $product)
            <div class="col-xs-2 panel panel-default" style="margin: 18px;">
                <div class="product">
                    <img class="img" src="{{$product->imagePath}}" alt="...">

                    <div class="caption">
                        <h3>{{$product->title}}</h3>

                        <p class="description">
                            {{$product->description}}
                        </p>
                        <div class="clearfix ">
                            <div class="clearfix">
                                <div class="price pull-right">{{$product->price}} $</div>
                                <div class="pull-left price">Price:</div>
                            </div>

                            <div class="clearfix">
                                <a href="{{Route('views.detail',[$product->id])}}" class="btn btn-default  btn-xs pull-left" role="button">View Details</a>
                                <a href="{{Route('product.addToCart', [$product->id])}}" class="btn btn-primary  btn-xs pull-right" role="button">Add to Cart</a>
                            </div>
                            <div  style="margin: 8px;"></div>
                        </div>

                    </div>


                </div>
            </div>
            @endforeach

        </div>
    @endforeach
    <center>{{ $products->links() }}</center>


@endsection