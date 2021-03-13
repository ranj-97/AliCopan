<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderItem extends Model
{
    use HasFactory;
    protected $table = 'customer_order_items';
    protected $fillable = [
        'customer_orderID',
        'order_itemID',
        'quantity',
        'sale_price',
        'note',
        'active',
    ];
}
