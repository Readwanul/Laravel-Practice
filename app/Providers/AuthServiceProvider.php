<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;

class AuthServiceProvider 
{
    public function login($email, $password)
    {
        $credentials = User::where('email', $email)->first();
        if (!$credentials || !password_verify($password, $credentials->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $token = $credentials->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $credentials
        ], 200);

    }
}
