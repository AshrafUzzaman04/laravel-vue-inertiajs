<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function create(User $user)
    {
        return $user->email === "ashraf.uzzaman04082004@gmail.com";
    }
}
