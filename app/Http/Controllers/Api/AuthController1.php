<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController1 extends Controller
{
    public function login(Request $request)
    {
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

        // Check the role and return appropriate response
        if ($user->hasRole('user')) {
            return response()->json([
                'message' => 'Login successful',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'role' => $roleName,
            ]);
        } elseif ($user->hasRole('admin') || $user->hasRole('super admin')) {
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'role' => $roleName,
            ]);
        }
    }

    public function user(Request $request)
    {
        $user = $request->user();
        $user->load('roles'); // Load roles relationship

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
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
