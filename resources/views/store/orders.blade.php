@extends('store.store')

@section('content')

    <div class="container">

        <h3>Meus Pedidos</h3>

        <table class="table">
            <thead>
            <tr>
                <td>#ID</td>
                <td>Itens</td>
                <td>Valor</td>
                <td>Status</td>
            </tr>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
                    <ul>
                    @foreach($order->items as $item)
                        <li>{{$item->product->name}}</li>
                    @endforeach
                    </ul>
                </td>
                <td>{{$order->total}}</td>
                <td>{{$order->status}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection