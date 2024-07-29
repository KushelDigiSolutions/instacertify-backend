<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminities extends Model
{
    use HasFactory;
	protected $table = 'aminities';

    protected $fillable = [
        'icon',
        'title',
        'is_active',
        'is_delete',
    ];

}
