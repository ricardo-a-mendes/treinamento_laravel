@extends('store.store')

@if(isset($product))
@section('breadcrumb')
    <li class="active">{{$product->category->name}}</li>
    <li class="active">{{$product->name}}</li>
@endsection
@endif

@section('categories_sidebar')
    @include('store.partial.categories_sidebar')
@endsection
@section('content')

    <div class="col-sm-9 padding-right">

        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="http://commerce.dev:10088/uploads/10.jpg" alt=""/>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="#"><img src="http://commerce.dev:10088/uploads/10.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/11.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/12.jpg" alt="" width="80"></a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-sm-7">
                <div>
                    <h4>Tags</h4>
                    @if(count($product->tags()->get()))
                    <ul class="list-inline">
                        @foreach($product->tags()->get() as $tag)
                            <li><a href="{{route('tagged.product.show', ['tagId' => $tag->id])}}">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="product-information"><!--/product-information-->

                    <h2>{{$product->category->name}} :: {{$product->name}}</h2>

                    <p>{{$product->description}}</p>
                    <span>
                        <span>R$ {{$product->price}}</span>
                            <a href="{{route('cart.add', ['id' => $product->id])}}" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Adicionar no Carrinho
                            </a>
                    </span>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@endsection