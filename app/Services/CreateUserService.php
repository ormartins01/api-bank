<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;
use Error;

class CreateUserService {
    public function execute(array $data) {
        $userExist = User::firstWhere('email', $data['email']);

        if(!is_null($userExist)) {
            throw new AppError('email already exists!', 400);
        }

        $userExist = User::firstWhere('cpf', $data['cpf']);

        if(!is_null($userExist)) {
            throw new AppError('cpf already exists!', 400);
        }


        return User::create($data);
    }
}