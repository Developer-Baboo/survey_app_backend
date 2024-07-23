<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController1 extends Controller
{
    public function login(Request $request)
    {
        // dd("dd");
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // Load the roles relationship
        $user->load('roles');

        // Get the name of the first role
        $roleName = $user->roles->first()->name ?? null;
        $name = $user->first_name;
        // Return response with role (no hasRole checks)
        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'role' => $roleName,
            'name'=> $name,
        ]);
    }

    public function register(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if the validated data contains the password correctly
        $validated = $validator->validated();


        $user = User::create([
            'first_name' => $validated['first_name'],
            'password' => Hash::make($validated['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }


    public function user(Request $request)
    {
        $user = $request->user();
        $user->load('roles'); // Load roles relationship

        return response()->json([
            'id' => $user->id,
            'name' => $user->first_name,
            'email' => $user->email,
            'role' => $user->roles->pluck('name')->first(), // Assuming one role per user
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}
