<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    public function scopeFeatured(Builder $query, $id = 0)
    {
        if ($id == 0)
            return $query->where('featured', '=', 1);
        else
            return $query->where('featured', '=', 1)->where('category_id', '=', $id);
    }

    public function scopeRecommended(Builder $query, $id = 0)
    {
        if ($id == 0)
            return $query->where('recommend', '=', 1);
        else
            return $query->where('recommend', '=', 1)->where('category_id', '=', $id);
    }

    public function getTagsAttribute()
    {
        return implode(',', $this->tags()->lists('name')->all());
    }
}
