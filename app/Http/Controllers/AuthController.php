<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

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
                    Passport::personalAccessTokensExpireIn(now()->addWeek());
                    array_push($scopes, 'corporations', 'companies');
                    break;
                case 2:
                    Passport::personalAccessTokensExpireIn(now()->addWeeks(2));
                    array_push($scopes, 'contacts', 'contracts');
                    break;
                case 3:
                    Passport::personalAccessTokensExpireIn(now()->addYear());
                    array_push($scopes, 'documents', 'corporation-document');
                    break;
            }

            $data['user'] = $user;
            $data['access_token'] = $user->createToken('Laravel 8', $scopes)->accessToken;

            return response()->success($data, 200);
        } else {
            return response()->error(['error' => 'Invalid credentials'], 401, "Unauthorized");
        }
    }
}
