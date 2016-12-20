<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

/**
 * Class CartController
 * @package CodeCommerce\Http\Controllers
 */
class CartController extends Controller
{
    /**
     * @var Cart
     */
    private $cart;

    /**
     * CartController constructor.
     * @param Cart $cart
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if(!Session::has('cart'))
            Session::set('cart', $this->cart);

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function getCart()
    {
        return (Session::has('cart')) ? Session::get('cart') : $this->cart;
    }
}