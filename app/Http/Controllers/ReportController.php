<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function index()
   {
        $Clients = DB::table('clients')
        //->leftJoin('invoices','clients.id', '=', 'invoices.ClientName')
        ->leftJoin('transactions','clients.id', '=', 'transactions.ClientId')
        ->select('clients.id', 'clients.Client', 'clients.ContactNumber','clients.PaymentStatus', DB::raw('SUM(transactions.Amount) as TotalPayment'))
        ->groupBy(['clients.id', 'clients.Client', 'clients.ContactNumber','clients.PaymentStatus'])
        ->paginate(100);

        // echo "<pre>";
        // print_r($Clients);

        // $Report  = DB::table('transactions')
        // ->leftJoin('invoices','transactions.InvoiceId', '=', 'invoices.id')
        // ->select('invoices.*','transactions.Amount')
        // ->get();
        return view('report.index',compact('Clients'))->with('Sl',1);
   }
}
