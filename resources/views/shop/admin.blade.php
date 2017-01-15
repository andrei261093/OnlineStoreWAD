@extends('layouts.master')

@section('title')
    Admin
@endsection

@section('content')

    <div class="container responsive table-responsive">
        <h2>Products:</h2>

        <div class="row">
            <div class="col-sm-6 col-md-6">
                <a href="{{route('admin.productForm')}}" type="button" class="btn btn-success pull-left">Add product</a>
                <a href="{{route('admin.categoryForm')}}" type="button" class="btn btn-default pull-left">Add category</a>
            </div>

            <form action="{{ route('adminSearch')}}" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" id="input" name="input" class="typeahead form-control" placeholder="Search Product">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr class="bg-info">
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr class="btn-default">
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}$</td>
                    <td>
                        <a href="{{Route('views.detail',[$product->id])}}">
                            <button class="btn btn-xs btn-primary">
                                <span class="glyphicon glyphicon-info-sign">Detalii</span></button>
                        </a>
                        <button onclick="getConfirmation('{{ route('deleteProduct', $product->id)}}');"
                                class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-trash">Sterge</span></button>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <center> {{ $products->links() }}</center>
    </div>


    <script>
        function getConfirmation(url) {
            if (window.confirm('Sigur vrei sa stergi?')) {
                window.location = url
            }
            else {
            }
        }

        var path = "{{Route('autocomplete')}}";

        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(path, { query : query }, function (data) {
                    return process(data);
                } )
            }
        });
    </script>


@endsection