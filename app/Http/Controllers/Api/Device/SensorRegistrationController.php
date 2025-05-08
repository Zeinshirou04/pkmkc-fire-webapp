<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Device\SensorTypeRequest;
use App\Models\Device\SensorType;
use Illuminate\Http\Request;

class SensorRegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(SensorTypeRequest $request)
    {
        try {
            $sensor_type = SensorType::create($request->all());

            return response()->json([
                'message' => 'Sensor Type successfully added.',
                'sensor_types' => $sensor_type
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Sensor Type registration failed',
                'error' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
