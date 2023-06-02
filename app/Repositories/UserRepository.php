<?php
namespace App\Repositories;

use App\Models\User;


class UserRepository
{
    public function create($request)
    {
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return $user;
    }
}