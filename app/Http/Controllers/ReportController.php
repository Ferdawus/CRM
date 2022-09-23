<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function index(Request $request)
   {
        $__Client = $request->get('Client');
        $__ContactNumber = $request->get('ContactNumber');

        $query = DB::table('clients')
        //->leftJoin('invoices','clients.id', '=', 'invoices.ClientName')
        ->leftJoin('transactions','clients.id', '=', 'transactions.ClientId')
        ->select('clients.id', 'clients.Client', 'clients.ContactNumber','clients.PaymentStatus','clients.Stutus', DB::raw('SUM(transactions.Amount) as TotalPayment'));

        $query = is_null($__Client) ? $query : $query->where('clients.Client', 'LIKE', "%$__Client%");
        $query = is_null($__ContactNumber) ? $query : $query->where('clients.ContactNumber', 'LIKE', "%$__ContactNumber%");

        $Clients = $query->groupBy(['clients.id', 'clients.Client', 'clients.ContactNumber','clients.PaymentStatus','clients.Stutus'])->paginate(100);

        // echo "<pre>";
        // print_r($Clients);

        // $Report  = DB::table('transactions')
        // ->leftJoin('invoices','transactions.InvoiceId', '=', 'invoices.id')
        // ->select('invoices.*','transactions.Amount')
        // ->get();
        return view('report.index',compact('Clients'))->with('Sl',1);
   }
   public function update_status($id, $status){
    DB::table('clients')->where('id',$id)->update([
        'Stutus' => $status,
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
    return redirect()->back();

}
}
