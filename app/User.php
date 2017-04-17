<?php

namespace CodeCommerce;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function orders() {
		return $this->hasMany(Order::class);
	}

	public function phones() {
		return $this->hasMany(Phone::class);
	}

	public function addresses() {
		return $this->hasMany(Address::class);
	}
}
