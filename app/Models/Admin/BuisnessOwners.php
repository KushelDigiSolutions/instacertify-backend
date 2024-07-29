<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuisnessOwners extends Model
{
    use HasFactory;
	protected $table = 'buisness_owners';

    protected $fillable = [
        'name',
        'respon_time',
        'phone',
        'email',
    ];

}
