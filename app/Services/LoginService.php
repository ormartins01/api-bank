<?php

namespace App\Services;

use App\Exceptions\AppError;
use Illuminate\Support\Facades\Log;

class LoginService {
    public function execute(array $data) {
        Log::debug('Service login');

        if (!$token = auth()->attempt($data)) {
            throw new AppError('email or password is incorrect!', 401);
        }

        return $this -> responseToken($token);
    }

    private function responseToken($token) {
        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }
}