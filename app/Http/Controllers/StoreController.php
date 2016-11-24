<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
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
        $featuredProducts = $this->product->ofFeatured()->get();
        $recommendedProducts = $this->product->ofRecommended()->get();
        $categories = $this->category->all();
        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }

    /**
     * Get all products from a specific category
     *
     * @param $slug Represents a category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProductsFromCategory($slug)
    {
        try {
            $category = $this->category->where('slug', '=', $slug)->firstOrFail();
            $featuredProducts = $this->product->ofFeatured($category->id)->get();
            $recommendedProducts = $this->product->ofRecommended($category->id)->get();
            $categories = $this->category->all();

            return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts', 'category'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Categoria não encontrada.');
        }

    }

    public function product($id)
    {
        $categories = $this->category->all();
        $product = $this->product->findOrFail($id);

        return view('store.product', compact('categories', 'product'));
    }

    /**
     * Get all products with a specific tag
     *
     * @param $tagID Tag ID to find products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProductsFromTag(Tag $tag, $tagID)
    {
        try {
            $taggedProducts = $this->product->OfTagged($tagID)->get();
            $categories = $this->category->all();
            $selectedTag = $tag->find($tagID);

            return view('store.index', compact('categories', 'taggedProducts', 'selectedTag'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Categoria não encontrada.');
        }

    }
}
