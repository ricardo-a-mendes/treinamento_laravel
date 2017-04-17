<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
