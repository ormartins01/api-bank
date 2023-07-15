<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;
use Error;

class CreateDepositService {
    public function execute(string $userId, float $value) {
        $userExist = User::find($userId);

        if(is_null($userExist)) {
            throw new AppError('user not found!', 404);
        }

        $userExist->balance += $value;
        $userExist->save();

        return $userExist;

    }
}