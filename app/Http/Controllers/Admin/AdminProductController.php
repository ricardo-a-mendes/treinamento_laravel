<?php

namespace CodeCommerce\Http\Controllers\Admin;


use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Requests\Admin\ProductImageRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function add(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function create(Requests\Admin\ProductRequest $request)
    {
        $dataCreate = $request->all();

        //Checkbox may not come on REQUEST (unchecked case)
        $dataCreate['featured'] = (int)(key_exists('featured', $dataCreate));
        $dataCreate['recommend'] = (int)(key_exists('recommend', $dataCreate));

        $this->product->fill($dataCreate)->save();
        return redirect()->route('productList');
    }

    public function edit(Category $category, $id)
    {
        try {
            $categories = $category->lists('name', 'id');
            $product = $this->product->findOrFail($id);
            return view('admin.product.update', compact('product', 'categories'));
        } catch (ModelNotFoundException $e) {
            echo 'Registro Não Localizado';
        }
    }

    public function update(Requests\Admin\ProductRequest $request, $id)
    {
        try {
            $dataUpdate = $request->all();

            //Checkbox may not come on REQUEST (unchecked case)
            $dataUpdate['featured'] = (int)(key_exists('featured', $dataUpdate));
            $dataUpdate['recommend'] = (int)(key_exists('recommend', $dataUpdate));

            $this->product->findOrFail($id)->fill($dataUpdate)->save();
            return redirect()->route('productList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser editado';
        }
    }

    public function delete($id)
    {
        try {
            $this->product->findOrFail($id)->delete();
            return redirect()->route('productList');
        } catch (ModelNotFoundException $e) {
            echo 'Registro não localizado para ser deletado';
        }
    }

    /**
     * @param $id ID do produto
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images($id)
    {
        $product = $this->product->find($id);

        return view('admin.product.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->product->find($id);

        return view('admin.product.create_image', compact('product'));
    }

    public function storeImage(ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('productImages', ['id' => $id]);
    }

    public function deleteImage(ProductImage $productImage, $id)
    {
        try {
            $image = $productImage->findOrFail($id);
            $imageName = $image->id . '.' . $image->extension;

            //Unlink the image
            if (file_exists(public_path('/uploads/' . $imageName)))
                Storage::disk('public_local')->delete($imageName);

            $product = $image->product;
            $image->delete();
            return redirect()->route('productImages', ['id' => $product->id]);
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }
}