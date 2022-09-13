<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = [
        'TransactionId',
        'ClientId',
        'InvoiceId',
        'TransactionDate',
        'PymentMethod',
        'AccountNumber',
        'Amount',
        'created_at',
        'updated_at'
    ];
}
