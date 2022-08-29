<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = [
        'Name',
        'ContactNumber',
        'AltnativeContact',
        'Country',
        'District',
        'RefrredBy',
        'Photo',
        'Address',
        'OthersInf',
        'Division',
        'CreatedBy',
        'UpdatedBy',
    ];
}
