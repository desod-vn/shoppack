<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;

class UserController extends Controller
{
    
    public function register(RegisterRequest $request)
    {
        $user = new User;
        
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký thành công.',
            'user' => $user,
            ]);
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            $user = User::where('username', $request->username)->first();
            $user->token = $user->createToken('App')->accessToken;

            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'user' => $user,
            ]);
        }
       
        return response()->json([
            'message' => 'Đăng nhập không thành công.',
            'status' => false,
        ]); 
    }

    public function logout()
    {
        if (Auth::check())
        {
            Auth::user()->token()->revoke();
            return response()->json([
                'message' => 'Đăng xuất thành công.',
                'status' => true,
            ]);
        }

        return response()->json([
            'message' => 'Đăng xuất không thành công.',
            'status' => false,
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'status' => true,
            'user' => $user,
        ]); 
    }

    public function update(User $user, UpdateRequest $request)
    {
        $this->authorize('updateUser', $user);

        $user->image = $request->image;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thông tin thành công.',
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        $this->authorize('deleteUser', $user);

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa tài khoản thành công.',
        ]);
    }

}
