<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$ClientId)
    {
     
        $Service = array();
        $Service['ClientId']             = $ClientId;
        $Service['BussinessName']        = $request->BussinessName;
        $Service['BussinessAddess']      = $request->BussinessAddess;
        $Service['OtherBussinessAddess'] = $request->OtherBussinessAddess;
        $Service['SoftwarePrice']        = $request->SoftwarePrice;
        $Service['InstallationSerge']    = $request->InstallationSerge;
        $Service['SLAType']              = $request->SLAType;
        $Service['SLAAmount']            = $request->SLAAmount;
        $Service['BillingType']          = $request->BillingType;
        $Service['BillingAmount']        = $request->BillingAmount;
        $Service['BillingDate']          = $request->BillingDate;
        $Service['ProductType']          = $request->ProductType;
        $Service['ProductInstallId']     = $request->ProductInstallId;
        $Service['ProductUrl']           = $request->ProductUrl;   
        $Service['ProductUserName']      = $request->ProductUserName;   
        $Service['ProductPassword']      = $request->ProductPassword;   
        $Service['ProductInstallDate']   = $request->ProductInstallDate;   
        $Service['RefrredBy']            = $request->RefrredBy;   
        $Service['HostedBy']             = $request->HostedBy;   
        $Service['DomainProvide']        = $request->DomainProvide;   
        $Service['ProductRenewDate']     = $request->ProductRenewDate;   
        $Service['created_at']           = $request->created_at;   
        DB::table('services')->insert($Service);
        return redirect()->back()->with('message','Data added Successfully');
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
    public function ClientServiceShow($id)
    {
        // $SLAs = DB::table('servicelevels')->get();
        // $Refers = DB::table('referreds')->get();
        // $Products = DB::table('products')->get();
        // $Hosts = DB::table('hosts')->get();
        // $Domains = DB::table('domains')->get();
        // $Clients = DB::table('clients')->get();
        $ClientService = DB::table('services')->where('id',$id)->first();
        $Client = DB::table('clients')->where('id',$ClientService->ClientId)->first();
        $data = [
            'ServiceShow' => $ClientService,
            'ShowClient'  => $Client,
        ];
        return json_encode($data);
        // return json_encode($ClientService);
        // return view('client.client-detail',compact('Services'));

    }
}
