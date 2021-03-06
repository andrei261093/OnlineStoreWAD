@extends('layouts.master')

@section('title')
    Iorga-Bercaru WAD 2016
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['qty']}}</span>
                            <strong>{{$product['item']['title']}}</strong>
                            <span class="label label-success">{{$product['price']}}</span>

                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                        data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('reduce',['id'=> $product['item']['id']] ) }}">Reduce by 1</a>
                                    </li>
                                    <li><a href="{{route('remove',['id'=> $product['item']['id']] ) }}">Remove all</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total price: {{$totalPrice}}$</strong>
                <a href="{{route('deleteCart')}}" type="button" class="btn btn-danger pull-right">Delete all</a>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{route('checkout')}}" type="button" class="btn btn-success center-block">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <img src="http://woodwork.be/media/wysiwyg/empty-cart.jpg" alt="">
            </div>
        </div>
    @endif
@endsection