<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDeptsReturn extends Model
{
    use HasFactory;
    protected $table = 'customer_depts_returns';
    protected $fillable = [
        'customerID',
        'payed',
        'pay_date',
        'active',
    ];
    protected $casts = [
        'pay_date' => 'datetime',
    ];
}
