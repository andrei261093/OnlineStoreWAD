@extends('layouts.master')

@section('title')
Iorga-Bercaru WAD
@endsection

@section('content')
    @foreach($products->chunk(5) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
            <div class="col-sm-6 col-md-2 panel panel-default" style="margin: 8px;">
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
                                <a href="#" class="btn btn-default  btn-xs pull-left" role="button">View Details</a>
                                <a href="#" class="btn btn-primary  btn-xs pull-right" role="button">Add to Cart</a>
                            </div>
                            <div  style="margin: 8px;"></div>
                        </div>

                    </div>


                </div>
            </div>
            @endforeach

        </div>
    @endforeach

@endsection