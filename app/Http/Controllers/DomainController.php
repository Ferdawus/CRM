<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Domains = DB::table('domains')->get();
        return view('domain.index',compact('Domains'))->with('SL',1);
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
        $request->validate([
            'Type'        => ['max:255'],
            'Provide'     => ['max:255'],
            'Description' => ['max:500']
        ]);

        $Domain                 = array();
        $Domain['Type']         = $request->Type;
        $Domain['Provide']      = $request->Provide;
        $Domain['Description']  = $request->Description;

        DB::table('domains')->insert($Domain);
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
        $data = DB::table('domains')->where('id',$id)->first();
        return json_encode($data);
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
        $domain                 = array();
        $domain['Type']         = $request->Type;
        $domain['Provide']      = $request->Provide;
        $domain['Description']  = $request->Description;
        // dd($request->id);
        $update = DB::table('domains')->where('id',$request->id)->update($domain);
        if ($update) {
            return redirect()->back()->with('message','Data updated Successfully');
        }else{
            return "not updated";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Domain = DB::table('domains')->where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }
}
