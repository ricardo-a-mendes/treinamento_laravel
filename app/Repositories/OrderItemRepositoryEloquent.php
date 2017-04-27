<?php

namespace CodeCommerce\Repositories;

use CodeCommerce\Entities\OrderItem;
use CodeCommerce\Validators\OrderItemValidator;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class OrderItemRepositoryEloquent extends CodeCommerceRepository implements OrderItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
