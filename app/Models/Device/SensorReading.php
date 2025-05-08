<?php

namespace App\Models\Device;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SensorReading extends Model
{
    use HasFactory;

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class, 'device_id', 'uuid');
    }

    public function sensorType(): BelongsTo
    {
        return $this->belongsTo(SensorType::class, 'sensor_type_code', 'code');
    }
}
