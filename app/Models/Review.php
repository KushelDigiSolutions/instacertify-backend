<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'detail',
        'images',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'rating' => 'integer',  // Rating is an integer
        'images' => 'array',    // Casts images as JSON array
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * A review belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * A review belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope to filter reviews with a specific rating.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $rating
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithRating($query, $rating)
    {
        return $query->where('rating', $rating);
    }

    /**
     * Scope to filter reviews by product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $productId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByProduct($query, $productId)
    {
        return $query->where('product_id', $productId);
    }
}
