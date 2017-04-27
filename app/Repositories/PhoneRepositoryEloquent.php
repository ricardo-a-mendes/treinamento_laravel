<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Phone;
use CodeCommerce\Validators\PhoneValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class PhoneRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class PhoneRepositoryEloquent extends CodeCommerceRepository implements PhoneRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Phone::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
