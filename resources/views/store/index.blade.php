@extends('store.store')

@if(isset($category) || isset($taggedProducts))
@section('breadcrumb')

    @if(isset($taggedProducts))
        <li class="active">Tag</li>
        <li class="active">{{$selectedTag->name}}</li>
    @endif

    @if(isset($category))
        <li class="active">Categoria</li>
        <li class="active">{{$category->name}}</li>
    @endif

@endsection
@endif

@section('categories_sidebar')
@include('store.partial.categories_sidebar')
@endsection
@section('content')
<div class="col-sm-9 padding-right">

    <!--tagged_items-->
    @if(isset($taggedProducts))
    <div class="features_items">
        <h2 class="title text-center">Produtos com a TAG "{{$selectedTag->name}}"</h2>
        @include('store.partial.products_list', ['products' => $taggedProducts])
    </div>
    @endif
    <!--tagged_items-->

    <!--features_items-->
    @if(isset($featuredProducts))
    <div class="features_items">
        <h2 class="title text-center">Em destaque</h2>
        @include('store.partial.products_list', ['products' => $featuredProducts])
    </div>
    @endif
    <!--features_items-->

    <!--recommended-->
    @if(isset($recommendedProducts))
    <div class="recommended_items">
        <h2 class="title text-center">Recomendados</h2>
        @include('store.partial.products_list', ['products' => $recommendedProducts])
    </div>
    @endif
    <!--recommended-->

</div>
@endsection