@extends('layouts.master')

@section('title')
    Iorga-Bercaru WAD 2016
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your total: $ {{$total}}</h4>

            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" required>

                        </div>
                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Address</label>
                            <input type="text" id="address" class="form-control" name="address" required>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Card Holder Name</label>
                            <input type="text" id="card-name" class="form-control" required>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Credit Card Number</label>
                            <input type="text" id="card-number" class="form-control" required>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Expiration Mounth</label>
                            <input type="text" id="card-mounth-expiry" class="form-control" required>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Expiration Year</label>
                            <input type="text" id="card-year-expiry" class="form-control" required>

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">CVC</label>
                            <input type="text" id="card-cvc" class="form-control" required>

                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Buy Now</button>
                {{csrf_field()}}
            </form>


        </div>
@endsection