@extends('store.store')
@section('categories_sidebar')
    @include('store.categories_sidebar')
@endsection
@section('content')
    <div class="col-sm-9 padding-right">

        <!--features_items-->
        <div class="features_items">

            <h2 class="title text-center">Em destaque</h2>

            @foreach($featuredProducts as $featuredProduct)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($featuredProduct->images) > 0)
                                    <img src="{{asset('uploads/'.$featuredProduct->images->first()->fullName)}}" alt="" />
                                @else
                                    <img src="{{asset('images/no-img.jpg')}}" alt="" />
                                @endif
                                <h2>R$ {{$featuredProduct->price}}</h2>
                                <p>{{$featuredProduct->id}} - {{$featuredProduct->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{$featuredProduct->price}}</h2>
                                    <p>{{$featuredProduct->name}}</p>
                                    <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--features_items-->

        <!--recommended-->
        <div class="features_items">
            <h2 class="title text-center">Recomendados</h2>

            @foreach($recommendedProducts as $recommendedProduct)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if(count($recommendedProduct->images) > 0)
                                    <img src="{{asset('uploads/'.$recommendedProduct->images->first()->fullName)}}" alt="" />
                                @else
                                    <img src="{{asset('images/no-img.jpg')}}" alt="" />
                                @endif
                                <h2>R$ {{$recommendedProduct->price}}</h2>
                                <p>{{$recommendedProduct->id}} - {{$recommendedProduct->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>R$ {{$recommendedProduct->price}}</h2>
                                    <p>{{$recommendedProduct->name}}</p>
                                    <a href="http://commerce.dev:10088/product/2" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>

                                    <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--recommended-->

    </div>
@endsection