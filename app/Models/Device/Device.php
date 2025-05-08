<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'latitude',
        'longitude'
    ];

    public function sensorReading(): HasMany
    {
        return $this->hasMany(SensorReading::class, 'device_id', 'uuid');
    }
}
