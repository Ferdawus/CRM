<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductTypes = DB::table('products')->get();
        return view('product-type.index',compact('ProductTypes'))->with('SL',1);
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
            'ProductType' => ['required','max:255'],
            'Description' => ['max:500'],
        ]);

        $ProductType                = array();
        $ProductType['ProductType'] = $request->ProductType;
        $ProductType['ProductName'] = $request->ProductName;
        $ProductType['Description'] = $request->Description;
        DB::table('products')->insert($ProductType);
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
        $data = DB::table('products')->where('id',$id)->first();
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
        $ProductType                = array();
        $ProductType['ProductType'] = $request->ProductType;
        $ProductType['ProductName'] = $request->ProductName;
        $ProductType['Description'] = $request->Description;
        DB::table('products')->where('id',$request->id)->update($ProductType);
        return redirect()->back()->with('message','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductType = DB::table('products')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }
}
