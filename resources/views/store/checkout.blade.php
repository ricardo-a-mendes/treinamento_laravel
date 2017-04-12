@extends('store.store')

@section('content')

    <div class="container">

        @if($cart == 'empty')
            <h3>Carrinho de compras está vazio!</h3>
        @else
        <h3>Pedido Realizado com Sucesso!</h3>

        <p>O pedido #{{$order->id}} foi gerado com sucesso!</p>
        @endif
    </div>
@endsection