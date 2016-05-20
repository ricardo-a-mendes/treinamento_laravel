<?php

namespace CodeCommerce\Http\Controllers\Admin;


use CodeCommerce\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return view('product', compact('products'));
    }

    public function edit($id)
    {
        try {
            dd($this->product->findOrFail($id));
        }
        catch (ModelNotFoundException $e)
        {
            echo 'Registro Não Localizado';
        }
    }
}
