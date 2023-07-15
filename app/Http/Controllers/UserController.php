<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreateDepositRequest, CreateUserRequest};
use App\Services\CreateDepositService;
use App\Services\CreateUserService;

class UserController extends Controller {
    public function create(CreateUserRequest $request) {
        $userCreated = new CreateUserService();

        return $userCreated->execute($request->all());
    }

    public function deposit(CreateDepositRequest $request) {
        $createDepositService = new CreateDepositService();

        return $createDepositService->execute(
            auth()->user()->id, 
            $request->value
        );
    }
}