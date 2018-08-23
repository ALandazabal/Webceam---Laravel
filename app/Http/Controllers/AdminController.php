<?php

namespace App\Http\Controllers;

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


    public function show_dashboard()
    {
        //return redirect()->route('admin.dashboard');
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')
                    ->where('admin_email',$admin_email)
                    ->where('admin_password',$admin_password)
                    ->first();

        /*if($result) {*/
        if(true) {
            /*Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');*/
            Session::put('admin_name','angelica');
            Session::put('admin_id','admin');
            //return redirect()->route('admin.dashboard');
        } else {
            Session::put('messege','Email or Password Invalid');
            //return redirect()->route('admin.dashboard');
        }
        return view('admin.dashboard');
        //$this->show_dashboard();
    }
    
}
