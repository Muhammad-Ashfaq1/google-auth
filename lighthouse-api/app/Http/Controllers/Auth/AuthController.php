<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller {
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();
            $user->tokens()->delete();
            $token = $user->createToken('Personal Access Token')->accessToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
            ]);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    public function redirectToGoogle() {
         return Socialite::driver('google')->stateless()->redirect();
    }
    public function handleGoogleCallback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email',$googleUser->getEmail())->first();
        if(!$user)
        {
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => 'password'
                ]
            );
        }
        $user->tokens()->delete();
        $token = $user->createToken('Personal Access Token')->accessToken;
        return redirect()->away(config('constant.frontend_url') . '?token=' . $token);
    }

}

