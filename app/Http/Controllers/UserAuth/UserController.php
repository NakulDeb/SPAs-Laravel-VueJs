<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class UserController extends Controller
{
    public function current_user()
    {
        $user =  Auth::user();
        return response()->json(['user'=> $user]);
    }

    public function logout(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $userTokens = $user->tokens;
        foreach($userTokens as $token) {
            $token->revoke(1);
        }
        return response()->json(['message'=> "You are Loged out."]);
    }
}
