<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserCreateService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function create(Request $request) {
        $userCreated = new UserCreateService();

        return $userCreated->execute($request->all());
    }
}