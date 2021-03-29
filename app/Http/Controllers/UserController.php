<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class UserController extends Controller
{
    
    public function register(RegisterRequest $request)
    {
        $user = new User;
        
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json($user);
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', $request->email)->first();
            $user->token = $user->createToken('App')->accessToken;

            return response()->json($user);
        }
       
        return response()->json([
            'message' => 'Unauthorized',
        ], 401); 
    }

    public function logout()
    {

        if (Auth::check())
        {
            Auth::user()->token()->revoke();
            return response()->json([
                'message' => 'Logout success'
            ], 200); 
        }

        return response()->json([
            'message' => 'Unauthorized',
        ], 401); 
    }

    public function user()
    {
        return response()->json(Auth::user()); 
    }

}
