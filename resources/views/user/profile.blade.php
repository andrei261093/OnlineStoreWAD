@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h3>
            @if(Auth::user())
                {{Auth::user()->firstName}} {{Auth::user()->lastName}}'s Profile
            @endif
            @if(!Auth::user())
                No user logged!!!
            @endif
        </h3>
    </div>
</div>
@endsection