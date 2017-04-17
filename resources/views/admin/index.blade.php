@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Actions</h1>

            <p>

                <a href="{{route('admin.product.index')}}" class="btn btn-primary btn-lg">Products</a>
                <a href="{{route('admin.category.index')}}" class="btn btn-default btn-lg">Categories</a>
                <a href="{{route('admin.orders.index')}}" class="btn btn-default btn-lg">Orders</a>
            </p>

        </div>
    </div>
@endsection