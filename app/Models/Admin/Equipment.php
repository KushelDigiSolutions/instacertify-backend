<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
	protected $table = 'equipments';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'type_description',
        'available_date',
        'images',
        'store_address',
        'category_ids',
        'size_type_id',
        'price',
        'stock',
        'booked_dates',
        'seo_title',
        'seo_description'
    ];

    protected $casts = [
        'category_ids' => 'array',
        'size_type_id' => 'array',
        'images' => 'array',
    ];


}
