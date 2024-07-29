<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LodgingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'seo_title',
        'seo_description',
        'is_active',
        'slug',
        'is_delete',
    ];

}
