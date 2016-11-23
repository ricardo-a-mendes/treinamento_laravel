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

    public function scopeOfFeatured(Builder $query, $id = 0)
    {
        if ($id == 0 || $id == '')
            return $query->where('featured', '=', 1);
        else
            return $query->where([
                ['featured', 1],
                ['category_id', $id]
            ]);
    }

    public function scopeOfRecommended(Builder $query, $id = 0)
    {
        if ($id == 0 || $id == '')
            return $query->where('recommend', '=', 1);
        else
            return $query->where([
                ['recommend', '=', 1],
                ['category_id', '=', $id]
            ]);
    }

    public function getTagsAttribute()
    {
        return implode(',', $this->tags()->lists('name')->all());
    }
}
