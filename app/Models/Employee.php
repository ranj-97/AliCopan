<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'birth_date',
        'phone',
        'password',
        'salary',
        'start_date',
        'end_date',
        'image',
        'last_login',
        'active',
    ];
    protected $casts = [
        'birth_date' => 'datetime',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'last_login' => 'datetime',
    ];
}
