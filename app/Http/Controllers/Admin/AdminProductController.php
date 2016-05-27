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
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        return view('admin.product.create');
    }

    public function create(Requests\Admin\ProductRequest $request)
    {
        $this->product->fill($request->all())->save();
        return redirect()->route('productList');
    }

    public function edit($id)
    {
        try {
            $product = $this->product->findOrFail($id);
            return view('admin.product.update', compact('product'));
        } catch (ModelNotFoundException $e) {
            echo 'Registro Não Localizado';
        }
    }

    public function update(Requests\Admin\ProductRequest $request, $id)
    {
        try {
            $this->product->findOrFail($id)->fill($request->all())->save();
            return redirect()->route('productList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser editado';
        }
    }

    public function delete($id)
    {

        try {
            $this->product->findOsFail($id)->delete();
            return redirect()->route('productList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser deletado';
        }

    }
}
