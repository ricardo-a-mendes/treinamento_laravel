<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Address extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = [
		'address',
		'number',
		'complement',
		'city',
		'state'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}

}
