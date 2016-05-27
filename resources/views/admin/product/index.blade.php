@extends('base')
@section('content')
    <div class="content">
        <div class="row">
            <h1>Products</h1>
            <a href="{{route('productAdd')}}" class="btn btn-default">New Product</a>
            <br>
            <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td><a href="{{route('productEdit', ['id' => $product->id])}}">{{$product->id}}</a></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                    <td>
                        <a href="{{route('productEdit', ['id' => $product->id])}}">Edit</a> |
                        <a href="{{route('productDelete', ['id' => $product->id])}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection