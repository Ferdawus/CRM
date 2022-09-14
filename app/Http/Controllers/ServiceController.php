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
        $SLAs          = DB::table('servicelevels')->get();
        $Refers        = DB::table('referreds')->get();
        $Products      = DB::table('products')->get();
        $Hosts         = DB::table('hosts')->get();
        $Domains       = DB::table('domains')->get();
        $Clients       = DB::table('clients')->get();
        // $ClientDetails = DB::table('clients')->where('id',$id)->first();

        $Services      = DB::table('services')
        ->leftJoin('products','services.ProductName', '=', 'products.id')
        ->leftJoin('servicelevels','services.SLAType', '=', 'servicelevels.id')
        ->leftJoin('referreds','services.RefrredBy','=','referreds.id')
        ->leftJoin('hosts','services.HostedBy','=','hosts.id')
        ->leftJoin('domains','services.DomainProvide','=','domains.id')
        ->select('services.*','products.ProductName','servicelevels.Type','referreds.Name','hosts.HostedBy','domains.Provide')
        ->get();
        return view('service.index',compact('SLAs','Refers','Products','Hosts','Domains','Services'))->with('SL',1);
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

        $Service                         = array();

        $Service['ClientId']             = $ClientId;
        $Service['BussinessName']        = $request->BussinessName;
        $Service['BussinessAddess']      = $request->BussinessAddess;
        $Service['OtherBussinessAddess'] = $request->OtherBussinessAddess;
        $Service['ProductType']          = $request->ProductType;
        $Service['ProductName']          = $request->ProductName;
        $Service['ProductInstallId']     = $request->ProductInstallId;
        $Service['ProductInstallDate']   = $request->ProductInstallDate;
        $Service['ProductBillDate']      = $request->ProductBillDate;
        $Service['RefrredBy']            = $request->RefrredBy;
        $Service['HostedBy']             = $request->HostedBy;
        $Service['DomainProvide']        = $request->DomainProvide ? $request->DomainProvide : 0;
        $Service['Note']                 = $request->Note;
        $Service['SoftwarePrice']        = $request->SoftwarePrice;
        $Service['InstallationSerge']    = $request->InstallationSerge;
        $Service['SLAType']              = $request->SLAType;
        $Service['SLAAmount']            = $request->SLAAmount;
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ClientServiceShow($id)
    {
        $ClientService = DB::table('services')->where('id',$id)->first();
        $Client        = DB::table('clients')->where('id',$ClientService->ClientId)->first();
        $data          = [
                            'ServiceShow' => $ClientService,
                            'ShowClient'  => $Client,
                        ];
        return json_encode($data);
        // return json_encode($ClientService);
    }

    public function ClientServiceUpdate(Request $request)
    {
        $Service                         = array();

        // $Service['ClientId']             = $ClientId;
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

        DB::table('services')->where('id',$request->id)->update($Service);
        return redirect()->back()->with('message','Data Update Succesfully');

    }
    public function getServicesByClientId($ClientId)
    {

        $getServicesByClientIds =  DB::table('services')
        ->leftJoin('products','services.ProductName', '=', 'products.id')
        ->select('products.id','products.ProductName')
        ->where('ClientId',$ClientId)->get();
        $options = "<option value=''>Select Item....</option>";

        foreach ($getServicesByClientIds as $getServicesByClientId) {
            $Id = $getServicesByClientId->id;
            $Product = $getServicesByClientId->ProductName;
            $options .= "<option value='$Id'>$Product</option>";
        }

        return json_encode($options);
        // echo "<pre>";
        // print_r($getServicesByClientId);

        // return $getServicesByClientId;
    }
}
