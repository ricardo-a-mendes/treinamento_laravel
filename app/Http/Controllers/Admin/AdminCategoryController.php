<?php

namespace CodeCommerce\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function edit($id)
    {
        try {
            dd($this->category->findOrFail($id));
        }
        catch (ModelNotFoundException $e)
        {
            echo 'Registro Não Localizado';
        }
    }
}
