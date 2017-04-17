<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
	/**
	 * @param Order $orderModel
	 * @param OrderItem $orderItem
	 * @return bool
	 */
	public function place(Order $orderModel, OrderItem $orderItem) {
		if (!Session::has('cart'))
			return false;

		/**
		 * @var $cart Cart
		 */
		$cart = Session::get('cart');

		if (!$cart instanceof Cart)
			return false;

		if ($cart->getTotal() > 0) {
			$order = $orderModel->create(['user_id' => Auth::id(), 'status_id' => 1, 'total' => $cart->getTotal()]);
			foreach($cart->all() as $productId => $cartItem) {
				$order->items()->create([
					'product_id' => $productId,
					'price' => $cartItem['price'],
					'quantity' => $cartItem['qtde'],
					'subtotal' => $cartItem['price']*$cartItem['qtde']
				]);
			}

			$cart->clear();

			event(new CheckoutEvent(Auth::user(), $order));
			return view('store.checkout', compact('order', 'cart'));
		}

		return view('store.checkout', ['cart' => 'empty']);
    }
}
