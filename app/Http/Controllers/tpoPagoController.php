<?php

namespace App\Http\Controllers;

use App\Tpo_pago;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class tpoPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Tpo_pago::all();

        return view('tpo_pago.all_pagos', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = null;
        return view('tpo_pago.add_pago', compact('pago'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago = new Tpo_pago();

        $pago->pago_id = $request->pago_id;
        $pago->pago_name = $request->input('pago_name');
        $pago->pago_description = $request->input('pago_description');
        if($request->publication_status == null)
            $pago->publication_status = '0';
        else
            $pago->publication_status = '1';
        /*$pago->publication_status = $request->publication_status;*/
        $pago->save();
        return redirect()->route('tpoPago.index');
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
    public function edit($pago_id)
    {
        $pago = Tpo_pago::where('pago_id',$pago_id)->first();
        return view('tpoPagos.edit_pago', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pago_id)
    {
        $data = array();
        $data['pago_name']=$request->pago_name; 
        $data['pago_description']=$request->pago_description;
        if($request->publication_status == null)
            $data['publication_status'] = '0';
        else
            $data['publication_status'] = '1';
        Tpo_pago::where('pago_id',$pago_id)->update($data);
        return redirect()->route('tpoPago.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pago_id)
    {
        $pago = Tpo_pago::where('pago_id',$pago_id)->delete();
        Session::put('message','Método de pago eliminado exitosamente !!');
        return redirect()->route('tpoPago.index');
    }

    public function active_pago($pago_id)
    {   
        Tpo_pago::where('pago_id',$pago_id)->update(['publication_status' => 1]);
        Session::put('message','Método de pago activado exitosamente !!');
        return redirect()->route('tpoPago.index');
    }

    public function unactive_pago($pago_id)
    {
        Tpo_pago::where('pago_id',$pago_id)->update(['publication_status' => 0]);
        Session::put('message','Método de pago desactivado exitosamente !!');
        return redirect()->route('tpoPago.index');
    }
}
