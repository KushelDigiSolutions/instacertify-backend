<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'images',
        'number_of_tickets',
        'ticket_price',
        'location',
        'category_ids',
        'date',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'seo_title',
        'seo_description',
        'single_day',
        'all_day',
        'is_active',
        'is_delete',
    ];

    protected $casts = [
        'category_ids' => 'array',
        'images' => 'array',
		'banner' => 'array',
		'instruct_pic' => 'array',
    ];


}
