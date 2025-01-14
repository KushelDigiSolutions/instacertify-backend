<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',       // Add this to allow mass assignment
        'total_price',
        'total_tax',
        'sale_price',
        'sale_tax',
        'order_amount',
        'order_status',
        'payment_id',
        'address_id',
    ];
}
