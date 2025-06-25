<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($dados)
    {
        $user = User::create([
            'name' => $dados->nome,
            'email' => $dados->email,
            'password' => Hash::make($dados->senha),
            'role' => $dados->role
        ]);

        return $user;
    }
}