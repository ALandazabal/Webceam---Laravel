<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        //return redirect()->route('admin.dashboard');
        //return view('admin_login');
        //return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin_login');
    }

    public function register()
    {
        return view('admin_register');
    }


    public function show_dashboard()
    {
        //return redirect()->route('admin.dashboard');
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        /*session_start();
        $_SESSION['email'] = $request->admin_email;*/
        $admin_email = $request->admin_email;
        /*$admin_password = md5($request->admin_password);
        $result = DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->where('admin_password',$admin_password)
                    ->first();*/

        /*if($result) {*/
        /*if(true) {*/
            /*Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');*/
           /* Session::put('admin_name','angelica');
            Session::put('admin_id','admin');*/
            //return redirect()->route('admin.dashboard');
        /*} else {
            Session::put('messege','Email or Password Invalid');*/
            //return redirect()->route('admin.dashboard');
        /*}
        return view('admin.dashboard');*/
        //$this->show_dashboard();

        $user = User::where('email', '=', $admin_email)->firstOrFail();
        if(count($user)==0){
            $user = User::where('username', '=', $admin_email)->firstOrFail();
        }
        $_SESSION['email'] = $user->email;
        if(password_verify($request->admin_password, $user->password)){
            if($user->type == '1'){
                return view('admin.dashboard'); 
            }else{
                if($user->status == '1'){
                    return view('user.dashboard');                
                }else{
                    Session::put('message','El usuario se encuentra deshabilitado. Por favor comuniquese con el administrador de la web !!');
                    return view('admin_login');
                }
            }
        }else{
            Session::put('message','El usuario o la contraseña no coinciden !!');
            return view('admin_login');
        }
        Session::put('message','El usuario no se encuentra registrado !!');
        return view('admin_register');
    }
    
}
