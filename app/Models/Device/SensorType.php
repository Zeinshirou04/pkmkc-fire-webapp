<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SensorType extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'unit'
    ];

    public function sensorReading(): HasMany
    {
        return $this->hasMany(SensorReading::class, 'sensor_type_code', 'code');
    }
}
