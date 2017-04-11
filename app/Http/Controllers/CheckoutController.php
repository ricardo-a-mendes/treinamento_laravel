<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
	public function place(Order $orderModel, OrderItem $orderItem) {
		if (!Session::has('cart')) {
			return false;
		}

		$cart = Session::get('cart');
		if ($cart instanceof Cart)

		if ($cart->getTotal() > 0) {
			$order = $orderModel->create(['user_id' => Auth::id(), 'total' => $cart->getTotal()]);
			foreach($cart->all() as $productId => $cartItem) {
				$order->items()->create([
					'product_id' => $productId,
					'price' => $cartItem['price'],
					'quantity' => $cartItem['qtde'],
					'subtotal' => $cartItem['price']*$cartItem['qtde']
				]);
			}

			dd($order);
		}
    }
}
