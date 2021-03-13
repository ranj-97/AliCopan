<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDept extends Model
{
    use HasFactory;
    protected $table = 'order_depts';
    protected $fillable = [
        'orderID',
        'customer_depts_ID',
        'payed',
        'payed_date',
        'active',
    ];
    protected $casts = [
        'payed_date' => 'datetime',
    ];
}
