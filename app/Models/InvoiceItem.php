<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $table = 'invoice_items';
    protected $fillable = [
        'InvoiceId',
        'ProductItem',
        'Description',
        'Qty',
        'UnitPrice',
        'LineTotal',
        'created_at',
        'updated_at'
    ];
}
