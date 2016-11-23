@extends('store.store')

@if(isset($category))
    @section('breadcrumb')
        <li class="active">{{$category->name}}</li>
    @endsection
@endif

@section('categories_sidebar')
    @include('store.partial.categories_sidebar')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">

        <!--features_items-->
        <div class="features_items">
            <h2 class="title text-center">Em destaque</h2>
            @include('store.partial.product', ['products' => $featuredProducts])
        </div>
        <!--features_items-->

        <!--recommended-->
        <div class="recommended_items">
            <h2 class="title text-center">Recomendados</h2>
            @include('store.partial.product', ['products' => $recommendedProducts])
        </div>
        <!--recommended-->

    </div>
@endsection