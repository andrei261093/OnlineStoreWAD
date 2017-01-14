@extends('layouts.master')

@section('title')
    Iorga-Bercaru WAD 2016
@endsection

@section('content')


    <h1 class="logo">
        <span class="word1">Be connected</span>
        <span class="word2">with your world</span>
    </h1>

    <br>
    <br>

    <div class="row">
        <!-- Carousel -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="http://marbleofdoom.com/wp-content/uploads/2015/11/macbook-pro-for-college.jpg"
                         alt="First slide">
                    <!-- Static Header -->
                </div>
                <div class="item">
                    <img src="https://toplaptop.info/wp-content/uploads/2015/03/laptop-asus.png"
                         alt="Second slide">
                    <!-- Static Header -->
                </div>
                <div class="item">
                    <img src="http://store.storeimages.cdn-apple.com/4974/as-images.apple.com/is/image/AppleInc/aos/published/images/i/ph/iphone7/plus/iphone7-plus-jetblack-select-2016?wid=1200&hei=630&fmt=jpeg&qlt=95&op_sharpen=0&resMode=bicub&op_usm=0.5,0.5,0,0&iccEmbed=0&layer=comp&.v=1472430122140"
                         alt="Third slide">
                    <!-- Static Header -->
                </div>

            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        <!-- /carousel -->
    </div>
    <br>
    <br>
    <h4 class="l1">
        Latest products
    </h4>

    <!-- See more products-->
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">

                        <img src="{{$product->imagePath}}" alt="">

                        <div class="caption">
                            <h4 class=" price pull-right">{{$product->price}}</h4>
                            <h4><a href="{{route('views.detail',[$product->id])}}">{{$product->title}}</a></h4>

                            <p class="description">
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach


        </div>
    @endforeach


@endsection