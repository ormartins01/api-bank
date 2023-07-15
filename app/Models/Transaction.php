<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory, HasUuids;

    protected $table = 'transactions';

    protected $fillable = [
        'value',
        'payer_id',
        'payee_id',
    ];

    

}
