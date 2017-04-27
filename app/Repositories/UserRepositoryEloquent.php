<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\User;
use CodeCommerce\Validators\UserValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class UserRepositoryEloquent extends CodeCommerceRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
