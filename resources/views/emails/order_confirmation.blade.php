Olá {{$user->name}}

Sua compra no valor de {{$order->total}} foi recebida com sucesso!
Veja os itens do seu pedido:
<table class="table table-condensed">
	<thead>
	<tr class="cart_menu">
		<td class="description">Item</td>
		<td class="price">Preço</td>
		<td class="price">Quantidade</td>
		<td class="price">Total</td>
	</tr>
	</thead>
	<tbody>

	@foreach($order->items as $item)
		<tr>
			<td class="cart_description">{{$item->name}}</td>
			<td class="cart_price">R$ {{$item->price}}</td>
			<td class="cart_quantity">{{$item->quantity}}</td>
			<td class="cart_total">R$ {{$item->price*$item->quantity}}</td>
		</tr>
	@endforeach

	</tbody>
	<tr class="cart_menu">
		<td colspan="4">
			<div class="pull-right">
				<span>TOTAL: R$ {{$order->total}}</span>
			</div>
		</td>
	</tr>
</table>