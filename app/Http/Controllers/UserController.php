<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Services\CreateUserService;

class UserController extends Controller {
    public function create(CreateUserRequest $request) {
        $userCreated = new CreateUserService();

        return $userCreated->execute($request->all());
    }
}