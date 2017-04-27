<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'user_id',
		'status_id',
		'total',
		'status'
	];
	public function items() {
		return $this->hasMany(OrderItem::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}

	public function status() {
		return $this->belongsTo(Status::class);
	}
}
