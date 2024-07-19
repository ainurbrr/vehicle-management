<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;


    protected $fillable = [
        'license_plate',
        'type',
        'status',
        'fuel_consumption',
        'service_schedule',
        'last_service_date',
        'is_rented',
        'rental_company',
    ];
}
