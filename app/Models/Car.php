<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Make sure this is here
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory; // ✅ This enables the factory() method

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'mileage',
        'fuel_type',
        'transmission',
        'condition',
        'description',
    ];
}
