<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'opening_time',
        'closing_time'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'branch_service', 'branch_id', 'service_id');
    }
}
