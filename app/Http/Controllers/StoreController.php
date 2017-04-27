<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Repositories\CategoryRepository;
use CodeCommerce\Repositories\ProductRepository;
use CodeCommerce\Repositories\TagRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StoreController extends Controller
{
    public $category;
    public $product;

    public function __construct(CategoryRepository $category, ProductRepository $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        $featuredProducts = $this->product->getFeatured();
        $recommendedProducts = $this->product->getRecommended();
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
            $category = $this->category->findByField('slug', $slug)->first();
            $featuredProducts = $this->product->getFeatured($category->id);
            $recommendedProducts =$this->product->getRecommended($category->id);
            $categories = $this->category->all();

            return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts', 'category'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Categoria não encontrada.');
        }
    }

    public function product($id)
    {
        $categories = $this->category->all();
        $product = $this->product->find($id);

        return view('store.product', compact('categories', 'product'));
    }

    /**
     * Get all products with a specific tag
     *
     * @param $tagID Tag ID to find products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProductsFromTag(TagRepository $tag, $tagID)
    {
        try {
            $taggedProducts = $this->product->getTagged($tagID);
            $categories = $this->category->all();
            $selectedTag = $tag->find($tagID);

            return view('store.index', compact('categories', 'taggedProducts', 'selectedTag'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Categoria não encontrada.');
        }

    }
}
