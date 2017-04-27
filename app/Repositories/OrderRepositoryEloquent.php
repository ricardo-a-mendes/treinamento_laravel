<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\Order;
use CodeCommerce\Validators\OrderValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class OrderRepositoryEloquent extends CodeCommerceRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
