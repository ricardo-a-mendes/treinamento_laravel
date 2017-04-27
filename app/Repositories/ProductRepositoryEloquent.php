<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Product;
use CodeCommerce\Validators\ProductValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class ProductRepositoryEloquent extends CodeCommerceRepository implements ProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

	public function getFeatured($id = 0)
	{
		if ($id == 0 || $id == '') {
			return $this->findByField('featured', 1);
		} else {
			return $this->findWhere([
				'featured' => 1,
				'category_id' => $id
			]);
		}
	}

	public function getRecommended($id = 0)
	{
		if ($id == 0 || $id == '') {
			return $this->findByField('recommend', 1);
		} else {
			return $this->findWhere([
				'recommend' => 1,
				'category_id' => $id
			]);
		}
	}

	public function getTagged($id = 0)
	{
		return $this->model->join('product_tag', 'product_tag.product_id', '=', 'products.id')
			->where('product_tag.tag_id', $id)->get();
	}
}
