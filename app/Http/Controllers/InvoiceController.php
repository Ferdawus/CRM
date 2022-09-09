<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $Invoices = DB::table('invoices')->get();
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
            $InvoiceItem->Description = $request->ItemDescription[$i];
            $InvoiceItem->Qty         = $request->ItemQty[$i];
            $InvoiceItem->UnitPrice	  = $request->ItemUnitPrice[$i];
            $InvoiceItem->LineTotal   = $request->ItemLineTotal[$i];

            $InvoiceItem->save();


        }
        return'Invoice Added SuccessFully !';

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
        //
    }
}
