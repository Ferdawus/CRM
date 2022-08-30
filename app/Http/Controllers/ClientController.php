<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Referred;
use App\Http\Controllers\DateTime;
use App\Models\ClientModel;

new \DateTime();
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Countries  = Country::all();
        $Divisions  = Division::all();
        $Districts  = District::all();
        $Referreds  = Referred::all();
        $Clients = DB::table('clients')->get();
        return view('client.index',compact('Clients','Countries','Districts','Divisions','Referreds'))->with('SL',1);
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
        $Client = array();
        $Client['Client'] = $request->Client;
        $Client['ContactNumber'] = $request->ContactNumber;
        $Client['AltnativeContact'] = $request->AltnativeContact;
        $Client['Country'] = $request->Country;
        $Client['Division'] = $request->Division;
        $Client['District'] = $request->District;
        $Client['RefrredBy'] = $request->RefrredBy;
        $Client['Photo'] = $request->Photo;
        $Client['Address'] = $request->Address;
        $Client['OthersInf'] = $request->OthersInf;
        $Client['created_at'] = date('Y-m-d H:i:s');
        $Client['CreatedBy'] = Auth::id();
        DB::table('clients')->insert($Client);
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
        $data = DB::table('clients')->where('id',$id)->first();
        return json_encode($data);
        // return view('client.edit',compact('data'));
        // echo "heloo";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $Client = array();
        $Client['Client']           = $request->Client;
        $Client['ContactNumber']    = $request->ContactNumber;
        $Client['AltnativeContact'] = $request->AltnativeContact;
        $Client['Country']          = $request->Country;
        $Client['Division']         = $request->Division;
        $Client['District']         = $request->District;
        $Client['RefrredBy']        = $request->RefrredBy;
        $Client['Photo']            = $request->Photo;
        $Client['Address']          = $request->Address;
        $Client['OthersInf']        = $request->OthersInf;
        $Client['created_at']       = date('Y-m-d H:i:s');
        $Client['UpdatedBy']        = Auth::id();
        DB::table('clients')->where('id',$request->id)->update($Client);
        return redirect()->back()->with('message','Data Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Client = DB::table('clients')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data Deleted Succesfully');
    }
    public function ClientDetail($id)
    {
        $ClientDetails = DB::table('clients')->where('id',$id)->first();
        // return $ClientDetails;
        return view('client.client-detail',compact('ClientDetails'));
    }
}