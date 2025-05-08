<?php

namespace App\Http\Controllers\Api\Device;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Device\Device;
use App\Http\Controllers\Controller;

class DeviceRegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $device = Device::create([
                'uuid' => Str::uuid(),
                'user_id' => $request->user_id
            ]);
            
            return response()->json([
                'message' => 'Device successfully registered.',
                'device' => $device
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Device registration failed',
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
