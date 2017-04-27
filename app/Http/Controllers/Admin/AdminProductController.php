<?php

namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\Admin\ProductImageRequest;
use CodeCommerce\Http\Requests\Admin\ProductRequest;
use CodeCommerce\Repositories\CategoryRepository;
use CodeCommerce\Repositories\ProductImageRepository;
use CodeCommerce\Repositories\ProductRepository;
use CodeCommerce\Repositories\TagRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    private $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create(CategoryRepository $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request, TagRepository $tagRepository)
    {
        $dataCreate = $request->all();

        //Checkbox may not come on REQUEST (unchecked case)
        $dataCreate['featured'] = (int)(key_exists('featured', $dataCreate));
        $dataCreate['recommend'] = (int)(key_exists('recommend', $dataCreate));

        $product = $this->product->fill($dataCreate);
        $product->save();

        $arrTagID = $this->handleTags($request->input('tags'), $tagRepository);
        $product->tags()->sync($arrTagID);

        return redirect()->route('admin.product.index');
    }

    public function edit(CategoryRepository $category, $id)
    {
        try {
            $categories = $category->lists('name', 'id');
            $product = $this->product->findOrFail($id);
            return view('admin.product.update', compact('product', 'categories'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro Não Localizado');
        }
    }

    public function update(ProductRequest $request, TagRepository $tagRepository, $id)
    {
        try {
            $dataUpdate = $request->all();

            //Checkbox may not come on REQUEST (unchecked case)
            $dataUpdate['featured'] = (int)(key_exists('featured', $dataUpdate));
            $dataUpdate['recommend'] = (int)(key_exists('recommend', $dataUpdate));

            $product = $this->product->findOrFail($id)->fill($dataUpdate);
            $product->save();

            $arrTagID = $this->handleTags($request->input('tags'), $tagRepository);
            $product->tags()->sync($arrTagID);

            return redirect()->route('admin.product.index');
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro não localizado para ser editado');
        }
    }

    public function destroy($id)
    {
        try {
            $product = $this->product->findOrFail($id);
            if (count($product->images) > 0) {
                $productImage = new ProductImage();
                foreach ($product->images as $image)
                    $this->destroyImage($productImage, $image->id);
            }
            $product->delete();
            return redirect()->route('admin.product.index');
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro não localizado para ser deletado');
        }
    }

    /**
     * @param $strTagField
     * @return array
     */
    private function handleTags($strTagField, TagRepository $tagRepository)
    {
        $arrTags = explode(',',$strTagField);
        $arrTagID = [];
        if (count($arrTags) > 0)
        {
            foreach ($arrTags as $tagName)
            {
                $tag = $tagRepository->findByField('name', $tagName);
                if ($tag->count() === 0)
                {
                    $createdTag = $tagRepository->create(['name' => $tagName]);
                    $arrTagID[] = $createdTag->id;
                }
                else
                {
                    $arrTagID[] = $tag[0]->id;
                }
            }
        }

        return $arrTagID;
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

    public function storeImage(ProductImageRequest $request, $id, ProductImageRepository $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->full_name, File::get($file));

        return redirect()->route('admin.product.image.index', ['id' => $id]);
    }

    public function destroyImage(ProductImageRepository $productImage, $id)
    {
        try {
            $image = $productImage->findOrFail($id);

            //Unlink the image
            if (file_exists(public_path('/uploads/' . $image->full_name)))
                Storage::disk('public_local')->delete($image->full_name);

            $product = $image->product;
            $image->delete();
            return redirect()->route('admin.product.image.index', ['id' => $product->id]);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}