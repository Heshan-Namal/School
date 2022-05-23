<?php

namespace App\Repositories;


use App\Models\UserType;
use App\Models\User;

class UserRepo {
    public function getAll()
    {
        return User::orderBy('name', 'asc')->get();
    }
}