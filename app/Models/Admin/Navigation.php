<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'added_by',
        'title',
        'background_color',
        'text_link_color',
        'hover_background_color',
        'link_hover_color',
        'items',
        'is_published',
    ];
}
