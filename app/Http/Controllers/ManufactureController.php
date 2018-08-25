<?php

namespace App\Http\Controllers;

use App\Manufacture;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufacture::all();

        return view('manufacture.all_manufactures', compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacture = null;
        return view('manufacture.add_manufacture', compact('manufacture'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manufacture = new manufacture();

        $manufacture->manufacture_id = $request->manufacture_id;
        $manufacture->manufacture_name = $request->input('manufacture_name');
        $manufacture->manufacture_description = $request->input('manufacture_description');
        $manufacture->publication_status = $request->input('publication_status');
        $manufacture->save();
        return redirect()->route('industria.index');
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
    public function edit($manufacture_id)
    {
        $manufacture = Manufacture::where('manufacture_id',$manufacture_id)->first();
        return view('manufacture.edit_manufacture', compact('manufacture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $manufacture_id)
    {
        $data = array();
        $data['manufacture_name']=$request->manufacture_name; 
        $data['manufacture_description']=$request->manufacture_description;
        $data['publication_status']=$request->publication_status;
        manufacture::where('manufacture_id',$manufacture_id)->update($data);
        return redirect()->route('industria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($manufacture_id)
    {
        $manufacture = Manufacture::where('manufacture_id',$manufacture_id)->delete();
        Session::put('message','Industria eliminada exitosamente !!');
        return redirect()->route('industria.index');
    }

    public function active_manufacture($manufacture_id)
    {   
        manufacture::where('manufacture_id',$manufacture_id)->update(['publication_status' => 1]);
        Session::put('message','Industria activada exitosamente !!');
        return redirect()->route('industria.index');
    }

    public function unactive_manufacture($manufacture_id)
    {
        manufacture::where('manufacture_id',$manufacture_id)->update(['publication_status' => 0]);
        Session::put('message','Industria desactivada exitosamente !!');
        return redirect()->route('industria.index');
    }
}
