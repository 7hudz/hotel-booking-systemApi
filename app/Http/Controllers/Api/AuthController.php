<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;



use Illuminate\Http\Request;

class AuthController extends Controller
{
   // AuthController.php
public function register(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:clients',
        'password' => 'required|string|min:8',
    ]);

    $client = Client::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    $token = $client->createToken('auth_token')->plainTextToken;

    return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
}

public function login(Request $request) {
    try {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        // Attempt to authenticate the client
        if (!Auth::guard('client')->attempt($credentials)) {
            // Authentication failed, return 401 Unauthorized response
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        // Authentication successful, retrieve the authenticated client
        $client = Client::where('email', $credentials['email'])->firstOrFail();
    
        // Create a token for the client and return it in the response
        $token = $client->createToken('auth_token')->plainTextToken;
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    } catch (\Exception $e) {
        Log::error('Login Error: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred during login.'], 500);
    }
  
}


}
