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
        return view('admin.category.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.category.create');
    }

    public function create(Requests\Admin\CategoryRequest $request)
    {
        $this->category->fill($request->all())->save();
        return redirect()->route('categoryList');
    }

    public function edit($id)
    {
        try {
            $category = $this->category->findOrFail($id);
            return view('admin.category.update', compact('category'));
        } catch (ModelNotFoundException $e) {
            echo 'Registro Não Localizado';
        }
    }

    public function update(Requests\Admin\CategoryRequest $request, $id)
    {
        try {
            $this->category->findOrFail($id)->fill($request->all())->save();
            return redirect()->route('categoryList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser editado';
        }
    }

    public function delete($id)
    {
        try {
            $this->category->findOrFail($id)->delete();
            return redirect()->route('categoryList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser deletado';
        }

    }
}
