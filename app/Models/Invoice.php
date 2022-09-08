<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [
        'ClientName',
        'InvoiceDate',
        'InvoiceName',
        'PurchaseOrderDate',
        'PaymentDueDate',
        'AccountNumber',
        'PaymentMethod',
        'SubTotal',
        'Discount',
        'Total',
        'Advance',
        'NetPayable',
        'created_at',
        'updated_at'
    ];
}
