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
    <br>
    <h4 class="l1">
        Latest products
    </h4>

    <!-- See more products-->
    @foreach($products->chunk(4) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail">

                        <img src="{{$product->imagePath}}" alt="">

                        <div class="caption">
                            <h4 class=" price pull-right" style="color: #5e5e5e;">Price:{{$product->price}}$</h4>
                            <h4><a href="{{route('views.detail',[$product->id])}}">{{$product->title}}</a></h4>

                            <p class="description">
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach


        </div>
        @endforeach

                <!-- our services-->
        <br>



        <div class="row text-center">
            <div class="col-lg-10 col-lg-offset-1">
                <br>

                <h2>Our Services</h2>
                <br>

                <hr class="small">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Buy online</strong>
                            </h4>

                            <p>You can buy all your dreams.</p>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Best team</strong>
                            </h4>

                            <p>Our team is in the top of the market.</p>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Best Products</strong>
                            </h4>

                            <p>We offer you the best and the newst products.</p>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                            <h4>
                                <strong>Buy safe</strong>
                            </h4>

                            <p>Buy your dreams safe using our website.</p>

                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- Contact -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <h4><strong>Join us</strong>
                </h4>

                <p>107 Calea Bucuresti
                    <br>Craiova, Romania</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-phone fa-fw"></i>0761667452</li>
                    <li><i class="fa fa-phone fa-fw"></i>0737156824</li>
                    <br>
                    <li><i class="fa fa-envelope-o fa-fw"></i> <a href="https://account.microsoft.com/?refd=outlook.live.com">bogdan.94@outlook
                            .com</a>
                    </li>
                    <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">andrei261093@icloud
                            .com</a>
                    </li>
                </ul>
                <br>
                <ul class="list-inline">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                    </li>
                </ul>
                <hr class="small">
                <p class="text-muted">Copyright &copy; Your Website 2014</p>
            </div>
        </div>


@endsection