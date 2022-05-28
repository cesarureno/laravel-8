<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $scopes = ['users'];

            switch ($user->role_id) {
                case 1:
                    array_push($scopes, 'corporations', 'companies');
                    break;
                case 2:
                    array_push($scopes, 'contacts', 'contracts');
                    break;
                case 3:
                    array_push($scopes, 'documents', 'corporation-document');
                    break;
            }

            $data['user'] = $user;
            $data['access_token'] = $user->createToken('Laravel 8', $scopes)->accessToken;

            return response()->json($data, 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
