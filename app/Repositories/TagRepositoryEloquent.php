<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Tag;
use CodeCommerce\Validators\TagValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TagRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class TagRepositoryEloquent extends CodeCommerceRepository implements TagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tag::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
