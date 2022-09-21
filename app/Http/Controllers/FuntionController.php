<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class FuntionController extends Controller
{
    public static function  UniqueCode()
    {
        $rand = rand(1111111,999999);
        return $rand;
    }
    public static function PaymentStatus($ClientId)
    {
        $TotalBill    = DB::table('invoices')->where('ClientName', $ClientId)->sum('Total');
        $TotalPayment = DB::table('transactions')->where('ClientId', $ClientId)->sum('Amount');

        if ($TotalPayment == 0) {
            return "Unpaid";
        }elseif($TotalBill > $TotalPayment ){
            return "Partial";
        }
        elseif($TotalBill < $TotalPayment ){
            return "Advance";
        }else{
            return "Paid";
        }
    }
}
