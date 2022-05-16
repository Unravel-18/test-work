<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthApiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (AuthApiRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request['email'])->first();
        if($user && Hash::check($request['password'], $user->password)){
            $token = $user->createToken($request->header('User-Agent'))->plainTextToken;
        }
        return response()->json([
            'access_token' => $token,
        ]);
    }
}
