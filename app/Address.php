<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
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
