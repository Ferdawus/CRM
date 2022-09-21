<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "hello";
        $Users = DB::table('users')->get();
        // $Roles = DB::table('roles')->get();
        $GetData = DB::table('users')
        ->join('roles','users.Role','=', 'roles.id')
        ->select('users.*','roles.Role as RoleName')
        ->get();
        $Roles = DB::table('roles')->get();
        // echo "<pre>";
        // print_r($Roles);

        return view('user.index',compact('GetData','Users' ,'Roles'))->with('SL',1);
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // $request->validate();
        $user = User::create([
            'name' => $request->name,
            'email'  => $request->email,
            'password' => Hash::make($request->password),
            'Role'    => $request->Role,
            'Status' => $request->Status,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->back();
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('users')->where('id',$id)->first();
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
        $User                = array();
        $User['name']        = $request->name;
        $User['email']       = $request->email;
        $User['password']    = $request->password;
        // $User['password_confirmation'] = $request->password_confirmation;
        $User['Role']        = $request->Role;
        DB::table('users')->where('id',$request->id)->update($User);
        return redirect()->back();
    }


    public function update_status($id, $status){
        DB::table('users')->where('id',$id)->update([
            'Status' => $status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
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
        $Client = DB::table('users')->where('id',$id)->delete();
        return redirect()->back();
    }
}
