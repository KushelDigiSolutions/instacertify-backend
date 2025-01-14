<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'address1',
        'address2',
        'landmark',
        'phone',
        'city',
        'state',
        'address_type',
        'pincode',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
