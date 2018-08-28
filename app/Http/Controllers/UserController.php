<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.all_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = null;
        return view('user.add_user', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $count = DB::table('users')
            ->selectRaw('count(*) as user_count')
            ->first();

        /*$user->id = $request->id;*/
        $user->id = $count->user_count;
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');        
        $user->password = $request->input('password');
        $user->status = '0';        
        $user->type = '1';
       /* $user->remember_token = $request->input('remember_token');*/
        $user->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::where('id', '=', $user_id)->firstOrFail();
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::where('id',$user_id)->first();
        return view('user.edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $data = array();
        $data['name']=$request->name; 
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['remember_token']=$request->remember_token;
        User::where('id',$user_id)->update($data);
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::where('id',$user_id)->delete();
        Session::put('message','Usuario eliminado exitosamente !!');
        return redirect()->route('usuario.index');
    }
}
