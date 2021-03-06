<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateUser(User $user){
        if($user->role === 'admin' || auth('api')->user()){
            return true;
        }
        return false;
    }

    public function deleteUser(User $user){
        if($user->role === 'admin'){
            return true;
        }
        return false;
    }
}
