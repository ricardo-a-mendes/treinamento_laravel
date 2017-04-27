<?php

namespace CodeCommerce\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeCommerce\Repositories\CartRepository;
use CodeCommerce\Entities\Cart;
use CodeCommerce\Validators\CartValidator;

/**
 * Class CartRepositoryEloquent
 * @package namespace CodeCommerce\Repositories;
 */
class CartRepositoryEloquent extends CodeCommerceRepository implements CartRepository
{

	public function __construct()
	{
		$this->items = [];
	}

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cart::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

	public function add($id, $name, $price)
	{
		$this->items[$id] = [
			'qtde' => isset($this->items[$id]['qtde']) ? ++$this->items[$id]['qtde'] : 1,
			'name' => $name,
			'price' => $price
		];
	}

	public function remove($id)
	{
		unset($this->items[$id]);
	}

	public function getAll()
	{
		return $this->items;
	}

	public function updateQuantity($productID, $quantity)
	{
		if (key_exists($productID, $this->items))
			$this->items[$productID]['qtde'] = (int) $quantity;
	}

	public function getTotal()
	{
		$total = 0;
		foreach ($this->items as $item)
			$total += ($item['qtde']*$item['price']);

		return $total;
	}

	public function clear() {
		$this->items = [];
	}
}
