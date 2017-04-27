<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductImage extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'product_id',
		'extension'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function getFullNameAttribute()
	{
		return $this->id.".".$this->extension;
	}
}
