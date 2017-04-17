@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Pedidos da Loja</h3>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <td>#ID</td>
                <td>User</td>
                <td>Items</td>
                <td>Total</td>
                <td>Status</td>
                <td>&nbsp;</td>
            </tr>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->user->name}}<br><small>{{$order->user->email}}</small></td>
                <td>
                    <ul>
                    @foreach($order->items as $item)
                        <li>{{$item->product->name}}</li>
                    @endforeach
                    </ul>
                </td>
                <td>{{$order->total}}</td>
                <td>{{$order->status->description}}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Change Status</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($statuses as $statusID => $status)
                                <li><a href="{{route('admin.orders.update', [$order->id, $statusID])}}">{{$statusID}} - {{$status}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection