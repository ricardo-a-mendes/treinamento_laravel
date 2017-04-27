<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'product_id',
		'price',
		'quantity',
		'subtotal'
	];

	public function order() {
		return $this->belongsTo(Order::class);
	}

	public function product() {
		return $this->belongsTo(Product::class);
	}
}
