<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['number'];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
