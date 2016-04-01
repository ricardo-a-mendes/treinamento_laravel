<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
//use function view;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->all();
        return view('category', compact('categories'));
    }
}
