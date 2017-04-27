<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function getTagsAttribute()
	{
		return implode(',', $this->tags()->lists('name')->all());
	}
}
