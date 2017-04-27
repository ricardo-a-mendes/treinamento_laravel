<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Category;
use CodeCommerce\Validators\CategoryValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class CategoryRepositoryEloquent extends CodeCommerceRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

	/**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
