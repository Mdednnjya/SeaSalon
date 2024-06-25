<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'service_type',
        'appointment_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_type', 'id');
    }
}
