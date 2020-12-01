<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login(Request $request){
        $user = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($user)){
            return response(['message' => 'Invalid login.'], 404);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return response(['user'=> Auth::user(), 'access_token'=>$accessToken]);

    }





    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleloginWithGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $myUser = \App\User::updateOrCreate(
            [
                'email' => $user->email,
                'api_id' => $user->id,
                'api_name' => 'google',
            ],
            [
                'name' => $user->name,
                'password' => \Hash::make($user->email),
                'photo' => $user->avatar
            ]
        );

        Auth::loginUsingId($myUser->id);
        $access_token = Auth()->user()->createToken('authToken')->accessToken;

        return view('home', compact('myUser', 'access_token'));
    }

    public function getResponseFromApi()
    {
        return response()->json(['user'=> session('apiUser')]);
    }


    public function refreshToken()
    {
        $http = new GuzzleHttp\Client;

        $response = $http->post('http://your-app.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => 'the-refresh-token',
                'client_id' => 'client-id',
                'client_secret' => 'client-secret',
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

}
