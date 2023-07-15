<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Transaction;
use App\Models\User;

class CreateTransactionService {
    public function execute(array $data) {
        $userPayer = $this->findUser($data['payer']);

        $userPayee = $this->findUser($data['payee']);

        if($userPayer == $userPayee) {
            throw new AppError('payer and receiver cannot be the same!', 404);
        }

        if($userPayer->balance < $data['value']) {
            throw new AppError('insufficient balance!', 404);
        }

        $userPayer->balance -= $data['value'];
        $userPayer->save();

        $userPayee->balance += $data['value'];
        $userPayee->save();


        return Transaction::create([
            'value' => $data['value'],
            'payer_id' => $userPayer->id,
            'payee_id' => $userPayee->id
        ]);

    }

    private function findUser(string $id) {
        $user = User::find($id);

        if(is_null($user)) {
            throw new AppError("user with this {$id} dont exist!", 404);
        }

        return $user;
    }
}