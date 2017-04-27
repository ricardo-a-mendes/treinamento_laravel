<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\ProductImage;
use CodeCommerce\Validators\ProductImageValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ProductImageRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class ProductImageRepositoryEloquent extends CodeCommerceRepository implements ProductImageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductImage::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
