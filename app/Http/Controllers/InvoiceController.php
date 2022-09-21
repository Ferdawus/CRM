<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\FuntionController;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Clients = DB::table('clients')->get();
        $Items   = DB::table('products')->get();

        $Invoices = DB::table('invoices')
        ->leftJoin('clients','invoices.ClientName','=','clients.id')
        ->leftJoin('transactions','invoices.id','transactions.InvoiceId')

        ->select('invoices.id', 'invoices.SubTotal', 'invoices.Discount',  'invoices.Total', 'invoices.InvoiceDate', 'invoices.InvoiceName', 'clients.Client', DB::raw('SUM(transactions.Amount) AS PaymentAmount'))

        ->groupBy(['invoices.id', 'invoices.SubTotal', 'invoices.Discount',  'invoices.Total', 'invoices.InvoiceDate', 'invoices.InvoiceName', 'clients.Client'])

        ->get();

        // echo "<pre>";
        //      print_r($Invoices);

        // exit();

        return view('invoice.index',compact('Clients','Items','Invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->request->all();
        // return $request->ItemName;

        $Invoice = Invoice::create($request->all());
        $TotalItems = sizeof($request->ItemName);
        for($i = 0; $i < $TotalItems; $i++)
        {
            $InvoiceItem              = new InvoiceItem();
            $InvoiceItem->invoiceId   = $Invoice->id;
            $InvoiceItem->ProductItem = $request->ItemName[$i];
            // $InvoiceItem->Description = $request->ItemDescription[$i];
            $InvoiceItem->Qty         = $request->ItemQty[$i];
            $InvoiceItem->UnitPrice	  = $request->ItemUnitPrice[$i];
            $InvoiceItem->LineTotal   = $request->ItemLineTotal[$i];
            $InvoiceItem->IsSetup     = $request->ItemIsSetup[$i] ? 1 : 0;
            // dd($request->ItemIsSetup);

            $InvoiceItem->save();
        }
        // dd($request->id );
        $Transaction                         = new Transaction();
        $Transaction->TransactionId          = rand(1111111,999999);
        $Transaction->ClientId               = $Invoice->ClientName;
        $Transaction->invoiceId              = $Invoice->id;
        $Transaction->TransactionDate	     = $Invoice->InvoiceDate;
        $Transaction->PymentMethod           = $Invoice->PymentMethod;
        $Transaction->AccountNumber	         = $Invoice->AccountNumber;
        $Transaction->Amount	             = $Invoice->Amount;
        $Transaction->save();

        $PaymentStatus = FuntionController::PaymentStatus($request->ClientName);
        DB::table('clients')->where('id', $request->ClientName)->update([
            "PaymentStatus" => $PaymentStatus,
        ]);

        $InvoiceItem = DB::table('invoice_items')
        ->leftJoin('products','invoice_items.ProductItem','products.id')
        ->select('invoice_items.*','products.ProductType','products.ProductName')
        ->where('invoice_items.InvoiceId',$Invoice->id)->get();

        $Data = [
            'Invoice'=> $Invoice,
            'InvoiceItem' => $InvoiceItem,
            'redirect_to' => URL::previous(),
        ];
        $PDF = Pdf::loadView('invoice.Pdf',$Data);
        return $PDF->download('invoice.pdf');
        // return redirect()->back()->with('message','Data added Successfully');
        // return view('invoice.template',compact('Invoice','InvoiceItem','Transaction'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('invoices')->where('id',$id)->delete();
        DB::table('invoice_items')->where('InvoiceId',$id)->delete();
        DB::table('transactions')->where('InvoiceId',$id)->delete();
        return redirect()->back()->with('message','Data deleted Successfully');
    }
    public function template($id)
    {

        $InvoiceItem = DB::table('invoice_items')
        ->leftJoin('products','invoice_items.ProductItem','products.id')
        ->select('invoice_items.*','products.ProductType','products.ProductName')
        ->where('invoice_items.InvoiceId',$id)->get();
        // echo "hello";
        // echo"<pre>";
        // print_r($InvoiceItem);

        $Invoice      = DB::table('invoices')
        ->leftjoin('clients','invoices.ClientName','clients.id')
        ->select('invoices.*','clients.id','clients.Client','clients.ClientId','clients.ContactNumber','clients.Country','clients.District','clients.Address')
        ->where('invoices.id',$id)
        ->first();

        return view('invoice.template',compact('Invoice','InvoiceItem'));
    }
    public function paymentPopShow($id)
    {
        // $data = DB::table('invoices')->where('id',$id)->first();
        $data = DB::table('invoices')
        ->leftJoin('clients','invoices.ClientName','=','clients.id')
        ->select('invoices.*','clients.id','clients.Client','clients.ContactNumber','clients.Address')
        ->where('invoices.id', $id)
        ->first();
        return json_encode($data);
    }

    public function transactionUpdate(Request $request)
    {

        $Transaction = Transaction::create($request->all());
        return view('invoice.recept');
    }
    public function getTransaction_per_invoice($id)
    {
        // $Client = DB::table('clients')->where('',$id)->get();
        $Client_Invoice     = DB::table('invoices')
        ->leftjoin('clients','invoices.ClientName','clients.id')
        ->select('invoices.*','clients.id','clients.Client','clients.ClientId','clients.ContactNumber','clients.Country','clients.District','clients.Address')
        ->where('invoices.id',$id)
        ->first();
        $getTransaction_per_invoices = DB::table('transactions')
        ->leftJoin('invoices','transactions.InvoiceId','=','invoices.id')
        ->select('transactions.*','invoices.id')
        ->where('transactions.InvoiceId',$id)
        ->paginate(5);
        // echo "<pre>";
        // print_r($getTransaction_per_invoices);
        // exit();

        return view('invoice.transaction',compact('getTransaction_per_invoices','Client_Invoice'));
    }

    public function receipt($id)
    {
        // $Transaction = DB::table('transactions')->where('id',$id)->get();
        $Transaction = DB::table('transactions')
        ->leftJoin('invoices','transactions.InvoiceId','=','invoices.id')
        ->leftJoin('clients','transactions.ClientId','=','clients.id')
        ->select('transactions.*','invoices.id','clients.Client','clients.ContactNumber','clients.Address')
        ->where('transactions.InvoiceId',$id)
        ->first();
        // echo "<pre>";
        //     print_r( $Transaction);
        // exit();

        return view('invoice.receipt',compact('Transaction'));
    }


}
