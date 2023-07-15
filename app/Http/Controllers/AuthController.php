<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class AuthController extends Controller {
    public function login(LoginRequest $request) {
        $authLogin = new LoginService();

        return $authLogin->execute($request->all());

    }

}
