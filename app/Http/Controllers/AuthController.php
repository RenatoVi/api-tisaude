<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutenticateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AutenticateRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        if (! Auth::attempt($credentials)) {
            return response()->json(['success' => false, 'message' => 'invalid Email or Password!']);
        } else {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('AuthToke')->accessToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
            ]);
        }
    }

    public function me()
    {
        dd('ola');
    }
}
