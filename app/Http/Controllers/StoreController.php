<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;

class StoreController extends Controller
{
    public $category;
    public $product;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $featuredProducts = $this->product->featured()->get();
        $recommendedProducts = $this->product->recommended()->get();
        $categories = $this->category->all();
        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }

    public function showProductsFromCategory($slug)
    {
        try {
            $category = $this->category->where('slug', '=', $slug)->firstOrFail();
            $featuredProducts = $this->product->featured($category->id)->get();
            $recommendedProducts = $this->product->recommended($category->id)->get();
            $categories = $this->category->all();
            return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Categoria não encontrada.');
        }

    }
}
