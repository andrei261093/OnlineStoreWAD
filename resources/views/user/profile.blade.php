@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>
            @if(Auth::user())
                {{Auth::user()->firstName}} {{Auth::user()->lastName}}'s Profile
            @endif
            @if(!Auth::user())
                No user logged!!!
            @endif
        </h2>
        <hr>
        <h4>Comenzile mele:</h4>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <span class="badge">{{$item['price']}}$</span>
                        {{$item['item']['title']}} | {{$item['qty']}} Items
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">Total price: {{$order->cart->totalPrice}}$</div>
        </div>
        @endforeach
    </div>
</div>
@endsection