<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
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
