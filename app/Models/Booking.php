<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'driver_id',
        'approver_level_1',
        'approver_level_2',
        'status',
        'start_date',
        'end_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function approverLevel1()
    {
        return $this->belongsTo(User::class, 'approver_level_1');
    }

    public function approverLevel2()
    {
        return $this->belongsTo(User::class, 'approver_level_2');
    }
}
