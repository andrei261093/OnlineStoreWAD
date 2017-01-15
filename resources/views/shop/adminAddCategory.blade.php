@extends('layouts.master')

@section('title')
    Add Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Add new category</center>
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
            <form action="{{route('admin.categoryForm')}}" method="post">
                <div class="form-group">
                    <label for="name">Category name</label>
                    <input class="form-control" type="text" id="name" name="name"/>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>



    <div class="container responsive table-responsive">
        <h2>Categories:</h2>

        <table class="table table-bordered">
            <thead>
            <tr class="bg-info">
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="btn-default">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>

                    <td>
                        <button onclick="getConfirmation('{{ route('deleteCategory', $category->id)}}');"
                                class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-trash">Delete</span></button>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <script>
        function getConfirmation(url) {
            if (window.confirm('Are you sure you want to delete?')) {
                window.location = url
            }
            else {
            }
        }
    </script>
@endsection