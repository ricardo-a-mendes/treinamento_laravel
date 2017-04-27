<?php

namespace CodeCommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeCommerce\Repositories\AddressRepository;
use CodeCommerce\Entities\Address;
use CodeCommerce\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class AddressRepositoryEloquent extends CodeCommerceRepository implements AddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
