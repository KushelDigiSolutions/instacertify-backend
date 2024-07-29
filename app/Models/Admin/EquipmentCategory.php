<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    use HasFactory;
	protected $table = 'equipment_categories';

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
