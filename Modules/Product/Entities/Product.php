<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'is_active',
        'quantity',
        'free_shipping',
    ];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new ();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
