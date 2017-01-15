@extends('layouts.master')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Add a product</center>
            </h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>
                            {{$error}}
                        </p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('admin.productForm')}}" method="post">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" type="text" id="name" name="title"/>
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input class="form-control" type="text" id="price" name="price"/>
                </div>
                <div class="form-group">
                    <label for="location">Short description</label>
                    <input class="form-control" type="text" id="location" name="description"/>
                </div>
                <div class="form-group">
                    <label for="clientObservations">Long Description</label>
                    <textarea class="form-control" type="text" rows="5" id="longDescription"
                              name="longDescription">  </textarea>
                </div>
                <div class="form-group">
                    <label for="location">Image URL</label>
                    <input class="form-control" type="text" id="destination" name="image"/>
                </div>

                <div>
                    <label for="location">Category</label>
                    <select class="pull-right" name="category">
                        @foreach($categories as $category)
                            <option  value="{{$category->id}}">{{$category->name}} </option>
                        @endforeach
                    </select>

                </div>
                <br>


                <button type="submit" class="btn btn-primary">Add</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection