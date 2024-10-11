<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name', 
        'slug', 
        'images', 
        'shipment_time', 
        'sku_name', 
        'quantity', 
        'rating_count', 
        'rating_number', 
        'price', 
        'sale_price', 
        'additional_tax', 
        'return_days', 
        'product_detail', 
        'product_specification', 
        'tags', 
        'status', 
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',  // Casts images as JSON array
        'product_specification' => 'array',  // Casts specifications as JSON array
        'tags' => 'array',  // Casts tags as JSON array
        'price' => 'float',  // Ensures price and sale_price are floats
        'sale_price' => 'float',
        'additional_tax' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A product can have many reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Scope for active products.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
