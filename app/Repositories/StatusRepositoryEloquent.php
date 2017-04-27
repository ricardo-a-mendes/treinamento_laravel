<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Status;
use CodeCommerce\Validators\StatusValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class StatusRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class StatusRepositoryEloquent extends CodeCommerceRepository implements StatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Status::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
