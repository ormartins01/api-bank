<?php

namespace App\Services;

use App\Models\User;
use Error;

class CreateUserService {
    public function execute(array $data) {
        $userExist = User::firstWhere('email', $data['email']);

        if(!is_null($userExist)) {
            throw new Error('email already exists!');
        }

        $userExist = User::firstWhere('cpf', $data['cpf']);

        if(!is_null($userExist)) {
            throw new Error('cpf already exists!');
        }


        return User::create($data);
    }
}