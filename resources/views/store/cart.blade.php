@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="price">Quantity</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cart->all() as $productId => $item)
                    <tr>
                        <td class="cart_product"><a href="#" >Imagem</a></td>
                        <td class="cart_description"><h4><a href="{{route('product.show', ['id' => $productId])}}">{{$item['name']}}</a></h4></td>
                        <td class="cart_price">R$ {{$item['price']}}</td>
                        <td class="cart_quantity">{{$item['qtde']}}</td>
                        <td class="cart_total">{{$item['qtde']*$item['price']}}</td>
                        <td class="cart_delete"><a href="#">Delete</a></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection