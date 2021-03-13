<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'orderID',
        'productID',
        'qualityID',
        'colorID',
        'quantity',
        'buying_price',
        'sale_price',
        'note',
        'number_in_storage',
        'image',
        'available',
        'active',
    ];
}
