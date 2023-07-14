<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CreateUserService;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function create(Request $request) {
        $userCreated = new CreateUserService();

        return $userCreated->execute($request->all());
    }
}