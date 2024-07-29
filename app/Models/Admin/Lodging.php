<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lodging extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'images',
        'location',
        'category_ids',
        'room_type_id',
        'check_in',
        'check_out',
        'price',
        'location_iframe',
        'aminities_ids',
        'buisness_owner_id',
        'feature_ids',
        'seo_title',
        'is_active',
        'seo_description'
    ];

    protected $casts = [
        'category_ids' => 'array',
		'aminities_ids' => 'array',
		'feature_ids' => 'array',
        'images' => 'array',
    ];


}
