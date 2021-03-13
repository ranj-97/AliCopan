<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;
    protected $table = 'customer_orders';
    protected $fillable = [
        'customerID',
        'user_name',
        'total_price',
        'payed',
        'dept',
        'active',
    ];
}
