<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
	protected $table = 'features';

    protected $fillable = [
        'image',
        'name',
        'sub_title',
        'is_delete',
    ];

}
