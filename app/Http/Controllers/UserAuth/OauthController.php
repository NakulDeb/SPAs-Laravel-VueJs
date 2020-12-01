<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class OauthController extends Controller
{
    public function redirect()
    {
//        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => 1,
            'redirect_uri' => 'http://localhost:8000/oauth/callback',
            'response_type' => 'code',
            'scope' => '',
            'state' => Str::random(40),
        ]);
//        dd($query);

        return redirect('http://localhost:8000/oauth/authorize?'.$query);
    }

    public function callBack(Request $request)
    {
        $response = Http::post('http://localhost:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 1,
                'client_secret' => 'client-secret',
                'redirect_uri' => 'http://localhost:8000/oauth/callback',
                'code' => $request->code,
            ],
        ]);dd($response);
        $response = $response->json();


        return json_decode((string) $response->getBody(), true);
    }
}
