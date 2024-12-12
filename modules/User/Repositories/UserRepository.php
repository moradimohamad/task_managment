<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepository
{

    public function create($data)
    {
        return User::query()->create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password'])
        ]);
    }
}
