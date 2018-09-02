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
    public function show_dashboard($email)
    {
        //return redirect()->route('admin.dashboard');
        $user = User::where('email', '=', $email)->firstOrFail();
        $_SESSION['email'] = $user->email;
        return view('user.dashboard');
    }

    public function perfil()
    {
        //return redirect()->route('admin.dashboard');
        return view('user.edit');
    }

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

        /*$count = DB::table('users')
            ->selectRaw('count(*) as user_count')
            ->first();

        $user->id = $request->id;
        $user->id = $count->user_count;*/
        if($request->input('password') != $request->input('password2')){
            Session::put('message','Las contraseñas no coinciden !!');
            return view('admin_register');
        }

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');        
        $user->password = password_hash($request->input('password'), PASSWORD_BCRYPT);
        $user->status = '0';        
        $user->type = '0';
        $user->seller_rating = '0';
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
        return view('admin.edit_user', compact('user'));
    }

    /**/public function edit_user($user_id)
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
        $user = User::where('id',$user_id)->first();
        $data = array();
        $data['name']=$request->name; 
        $data['username']=$request->username; 
        $data['email']=$request->email;
        /*if($request->password2 == ''){
            $data['password']=$request->password;
        }else{
            if($request->password == $request->password2){
                $data['password']=$request->password;
            }else{
                Session::put('message','Las contraseñas no coinciden !!');
                //return view('admin_register');
            }
        }*/
        if($request->password != ''){
            if($request->password == $request->password2){
                $data['password']=password_hash($request->password, PASSWORD_BCRYPT);
            }else{
                Session::put('message','Las contraseñas no coinciden !!');
                return view('admin.edit_user', compact('user'));
            }
        }
        $data['phone']=$request->phone; 
        $data['address']=$request->address;
        /*$data['status']=$request->status; 
        if($request->status == null){
            $data['status']='0';
        }else{
            $data['status']='1';
        }*/
        $data['city']=$request->city;
        /*if($request->type == null){
            $data['type']='0';
        }else{
            $data['type']='1';
        }*/

        $avatar=$request->file('avatar');
        if ($avatar) {
            $user_info=DB::table('users')
                ->where('id',$user_id)
                ->first();
       
            \File::delete($user_info->avatar);

           $avatar_name=str_random(20);
           $ext=strtolower($avatar->getClientOriginalExtension());
           $avatar_full_name=$avatar_name.'.'.$ext;
           $upload_path='avatar/';
           $avatar_url=$upload_path.$avatar_full_name;
           $success=$avatar->move($upload_path,$avatar_full_name);
        }

        User::where('id',$user_id)->update($data);
        Session::put('message','Usuario actualizado correctamente !!');
        return redirect()->route('usuario.index');
    }

    public function update_user(Request $request, $user_id)
    {
        $user = User::where('id',$user_id)->first();
        $data = array();
        $data['name']=$request->name; 
        $data['username']=$request->username; 
        $data['email']=$request->email;
        
        if($request->password != ''){
            if($request->password == $request->password2){
                $data['password']=password_hash($request->password, PASSWORD_BCRYPT);
            }else{
                Session::put('message','Las contraseñas no coinciden !!');
                return view('user.edit_user', compact('user'));
            }
        }
        $data['phone']=$request->phone; 
        $data['address']=$request->address;
        
        $data['city']=$request->city;
        

        $avatar=$request->file('avatar');
        if ($avatar) {
            $user_info=DB::table('users')
                ->where('id',$user_id)
                ->first();
       
            \File::delete($user_info->avatar);

           $avatar_name=str_random(20);
           $ext=strtolower($avatar->getClientOriginalExtension());
           $avatar_full_name=$avatar_name.'.'.$ext;
           $upload_path='avatar/';
           $avatar_url=$upload_path.$avatar_full_name;
           $success=$avatar->move($upload_path,$avatar_full_name);
        }

        User::where('id',$user_id)->update($data);
        Session::put('message','Datos actualizados correctamente !!');
        /*return redirect()->route('usuario.show_dashboard');*/
        $_SESSION['email'] = $user->email;
        return view('user.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = User::where('id',$user_id)->first();

        $file_path =  public_path().'/avatar/'.$user->avatar;
        \File::delete($file_path);

        $user = User::where('id',$user_id)->delete();
        Session::put('message','Usuario eliminado exitosamente !!');
        return redirect()->route('usuario.index');
    }

    public function active_user($user_id)
    {
        User::where('id',$user_id)->update(['status' => 1]);
        Session::put('message','Usuario activado exitosamente !!');
        return redirect()->route('usuario.index');
    }

    public function unactive_user($user_id)
    {
        User::where('id',$user_id)->update(['status' => 0]);
        Session::put('message','Usuario desactivado exitosamente !!');
        return redirect()->route('usuario.index');
    }

    public function unactive($user_id)
    {
        User::where('id',$user_id)->update(['status' => 0]);
        /*Session::put('message','Usuario desactivado exitosamente !!');*/
        return view('layout');
    }

    public function become_user_admin($user_id)
    {
        User::where('id',$user_id)->update(['type' => 1]);
        Session::put('message','Usuario modificado exitosamente !!');
        return redirect()->route('usuario.index');
    }
}
