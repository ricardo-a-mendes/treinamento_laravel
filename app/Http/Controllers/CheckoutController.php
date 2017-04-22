<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
	/**
	 * @param Order $orderModel
	 * @param OrderItem $orderItem
	 * @return bool
	 */
	public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService) {
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
			$pagSeguroCheckout = $checkoutService->createCheckoutBuilder()->setReference($order->id);
			foreach($cart->all() as $productId => $cartItem) {
				$subTotal = $cartItem['price']*$cartItem['qtde'];
				$order->items()->create([
					'product_id' => $productId,
					'price' => $cartItem['price'],
					'quantity' => $cartItem['qtde'],
					'subtotal' => $subTotal
				]);
				$pagSeguroCheckout->addItem(new Item($productId, $cartItem['name'], $cartItem['price'], $cartItem['qtde']));
			}

			$cart->clear();

			$pagSeguroCheckoutResponse = $pagSeguroCheckout->getCheckout();
			$response = $checkoutService->checkout($pagSeguroCheckoutResponse);
			$order->payment_code = $response->getCode();
			$order->save();

			event(new CheckoutEvent(Auth::user(), $order));
			//return view('store.checkout', compact('order', 'cart'));
			return redirect($response->getRedirectionUrl());
		}

		return view('store.checkout', ['cart' => 'empty']);
    }

	public function pagSeguro(CheckoutService $checkoutService) {
		$checkout = $checkoutService->createCheckoutBuilder()
			->setReference(12345)
			->addItem(new Item(1, 'Televisão LED 500', 8999.99, 1))
			->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99, 2))
			->getCheckout();

		$response = $checkoutService->checkout($checkout);


		return redirect($response->getRedirectionUrl());
    }
}
