@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Images of {{$product->name}}</h1>
            <a href="{{route('admin.product.image.create', ['id'=>$product->id])}}" class="btn btn-default">New Image</a>
            <br>
            <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Extension</th>
                    <th>Action</th>
                </tr>
                @foreach($product->images as $image)
                <tr>
                    <td>{{$image->id}}</td>
                    <td><img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80"></td>
                    <td>{{$image->extension}}</td>
                    <td><a href="{{route('admin.product.image.destroy', ['id' => $image->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </table>
            <a href="{{route('admin.product.index')}}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection