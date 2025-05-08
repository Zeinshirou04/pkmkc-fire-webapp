<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\Controller;
use App\Models\Device\SensorReading;
use App\Models\Device\SensorType;
use Illuminate\Http\Request;

class SensorReadingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $device_id = $request->device_id;
        $reading = $request->except('device_id');
        $sensor_reading_data = array_map(function ($code, $value) use ($device_id) {
            return [
                'device_id' => $device_id,
                'sensor_type_code' => $code,
                'value' => $value
            ];
        }, array_keys($reading), $reading);

        try {
            $sensor_reading = SensorReading::insert($sensor_reading_data);

            return response()->json([
                'message' => 'Sensor Reading successfully recorded.',
                'sensor_reading' => $sensor_reading
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sensor Reading record failed',
                'error' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $sensor_data = SensorType::with(['sensorReading' => function ($query) use ($id) {
                $query->where('device_id', $id)->latest('created_at')->take(1);
            }])->get();

            return response()->json([
                'message' => 'Successfully get reading data.',
                'reading_data' => $sensor_data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to get reading data.',
                'error' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
