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
                    {!! Form::open(['route' => ['cart.update'], 'method' => 'POST']) !!}
                    @forelse($cart->getAll() as $productId => $item)
                    <tr>
                        <td class="cart_product"><a href="#" >Imagem</a></td>
                        <td class="cart_description"><h4><a href="{{route('product.show', ['id' => $productId])}}">{{$item['name']}}</a></h4></td>
                        <td class="cart_price">R$ {{$item['price']}}</td>
                        <td class="cart_quantity">
                            <div class="form-group col-xs-3">
                                {!! Form::number('qtde['.$productId.']', $item['qtde'], ['min'=>1, 'step' => 1, 'class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-xs-2">
                                <a href="#" class="glyphicon glyphicon-repeat updateQuantity"></a>
                            </div>
                        </td>
                        <td class="cart_total">{{$item['qtde']*$item['price']}}</td>
                        <td class="cart_delete"><a href="{{route('cart.destroy', ['id' => $productId])}}">Delete</a></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6"><p>Nenhum item encontrado</p></td>
                        </tr>
                    @endforelse
                    {!! Form::close() !!}
                    </tbody>
                    <tr class="cart_menu">
                        <td colspan="5">
                            <div class="pull-right">
                                <span>TOTAL: {{$cart->getTotal()}}</span>
                            </div>
                        </td>
                        <td>
                            <div class="">
                                <a href="{{route('checkout.place')}}" class="btn btn-success">Fechar Compra</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script type="text/javascript">
    $(function () {

        $('.updateQuantity').click(function () {
            $('form').submit();
        });

    });
</script>
@endsection