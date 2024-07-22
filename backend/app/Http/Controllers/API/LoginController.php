<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\LoginUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', '=', $data['name'])->first();

        if ($user !== null && Hash::check($data['password'], $user->password)) {
            return new LoginUserResource($user);
        } else {
            return response('Wrong data', '422');
        }
    }

    public function register()
    {
        //todo
    }
}
