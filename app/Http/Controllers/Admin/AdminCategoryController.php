<?php

namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoryController extends Controller
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
