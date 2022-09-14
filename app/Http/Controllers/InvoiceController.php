<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

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
        ->select('invoices.*','clients.Client')
        ->get();
        return view('invoice.index',compact('Clients','Items','Invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return redirect()->back()->with('message','Data added Successfully');
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
        //
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

        $dataShowInvoice     = DB::table('invoices')->where('id',$id)->first();
        $dataShowInvoiceItem = DB::table('invoice_items')
        ->leftJoin('products','invoice_items.ProductItem','products.id')
        ->select('invoice_items.*','products.ProductType','products.ProductName')
        ->where('invoice_items.id',$id)->first();

        $dataShowClient      = DB::table('invoices')
        ->leftjoin('clients','invoices.ClientName','clients.id')
        ->select('invoices.*','clients.id','clients.Client','clients.ClientId','clients.ContactNumber','clients.Country','clients.District','clients.Address')
        ->where('invoices.id',$id)
        ->first();

        return view('invoice.template',compact('dataShowInvoice','dataShowInvoiceItem','dataShowClient'));
    }


}
