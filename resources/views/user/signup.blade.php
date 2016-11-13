@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Sign Up</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>
                        {{$error}}
                    </p>
                @endforeach
            </div>
        @endif
        <form action="{{ route('user.signup')}}" method="post">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input class="form-control" type="text" id="firstName"name="firstName"/>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input class="form-control" type="text" id="lastName"name="lastName"/>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input class="form-control" type="text" id="email"name="email"/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password"/>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            {{ csrf_field() }}
        </form>
    </div>
</div>
@endsection