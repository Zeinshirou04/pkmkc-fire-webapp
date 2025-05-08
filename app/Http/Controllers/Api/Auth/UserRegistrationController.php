<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $user_cred = [
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user_profile = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone
        ];

        try {
            $user = User::create($user_cred);
            $user->userProfile()->create($user_profile);

            $token = $user->createToken('mobile_user_session')->plainTextToken;

            return response()->json([
                'message' => 'Successfully Registered',
                'token' => $token,
                'user' => $user
            ], 201);
        } catch (QueryException $q) {
            return response()->json([
                'message' => 'Register Failed with Message: ' . $q->getMessage(),
            ], 400);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Register Failed with Message: ' . $th->getMessage(),
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
