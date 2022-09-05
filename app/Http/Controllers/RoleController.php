<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Roles = DB::table('roles')->get();
        // return view('user.index',compact('Roles'));
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
            'Role'        => ['required','max:25'],
            'Description' => ['max:1000'],
        ]);

        $Role                = array();
        $Role['Role']        = $request->Role;
        $Role['Description'] = $request->Description;
        DB::table('roles')->insert($Role);
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
        $data = DB::table('roles')->where('id',$id)->first();
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
        $Role                = array();
        $Role['Role']        = $request->Role;
        $Role['Description'] = $request->Description;
        DB::table('roles')->where('id',$request->id)->update($Role);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Role = DB::table('roles')->where('id',$id)->delete();
        return redirect()->back();
    }
    public function RoleAsignStore(Request $request)
    {
        // dd($request->all());
        if(count($request->view) > 0){
            $views = $request->view;
            foreach($views as $key => $value){

                $get_data = DB::table('roleasigns')->where('Menu', $key)->first();
                if($get_data){
                    //update
                    DB::table('roleasigns')->where('Menu', $key)->update([
                        'View' => $value ? 1 : 0,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }else{
                    //insert
                    DB::table('roleasigns')->insert([
                        'Menu' => $key,
                        'View' => $value ? 1 : 0,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }

            }
        }
        //  dd($request->all());
        if (count($request->create) > 0) {
            $creates = $request->create;
            // dd($creates);
            foreach ($creates as $key => $value) {
                $get_data = DB::table('roleasigns')->where('Menu',$key)->first();
                if ($get_data) {
                    DB::table('roleasigns')->where('Menu',$key)->update([
                        'Create' => $value ? 1 : 0,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                }else{
                    DB::table('roleasigns')->insert([
                        'Menu'=>$key,
                        'Create'=> $value ? 1 : 0,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
            
        }
        
        if(count($request->edit) > 0){
           $edits = $request->edit;
           foreach ($edits as $key => $value) {
            $get_data = DB::table('roleasigns')->where('Menu',$key)->first();

            if ($get_data) {
                DB::table('roleasigns')->where('Menu',$key)->update([
                    'Edit' => $value ? 1 : 0,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }else{
                DB::table('roleasigns')->insert([
                    'Menu'=>$key,
                    'Edit'=> $value ? 1 : 0,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
           }
            
        }

        if(count($request->delete) > 0){
            $deletes = $request->delete;
            foreach ($deletes as $key => $value) {
             $get_data = DB::table('roleasigns')->where('Menu',$key)->first();
 
             if ($get_data) {
                 DB::table('roleasigns')->where('Menu',$key)->update([
                     'Delete' => $value ? 1 : 0,
                     'updated_at' => date('Y-m-d H:i:s'),
                 ]);
             }else{
                 DB::table('roleasigns')->insert([
                     'Menu'=>$key,
                     'Delete'=> $value ? 1 : 0,
                     'created_at' => date('Y-m-d H:i:s'),
                 ]);
             }
            }
             
         }
        return redirect()->back();
        

    }
}
