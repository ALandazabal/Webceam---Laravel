<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();

        return view('payment.all_payments', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment = null;
        return view('payment.add_payment', compact('payment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();

        $payment->payment_id = $request->payment_id;
        $payment->payment_name = $request->input('payment_name');
        $payment->payment_description = $request->input('payment_description');
        if($request->publication_status == null)
            $payment->publication_status = '0';
        else
            $payment->publication_status = '1';
        /*$payment->publication_status = $request->publication_status;*/
        $payment->save();
        return redirect()->route('metodo-pago.index');
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
    public function edit($payment_id)
    {
        $payment = Payment::where('payment_id',$payment_id)->first();
        return view('payment.edit_payment', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $payment_id)
    {
        $data = array();
        $data['payment_name']=$request->payment_name; 
        $data['payment_description']=$request->payment_description;
        if($request->publication_status == null)
            $data['publication_status'] = '0';
        else
            $data['publication_status'] = '1';
        Payment::where('payment_id',$payment_id)->update($data);
        return redirect()->route('metodo-pago.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($payment_id)
    {
        $payment = Payment::where('payment_id',$payment_id)->delete();
        Session::put('message','Método de pago eliminado exitosamente !!');
        return redirect()->route('metodo-pago.index');
    }

    public function active_payment($payment_id)
    {   
        Payment::where('payment_id',$payment_id)->update(['publication_status' => 1]);
        Session::put('message','Método de pago activado exitosamente !!');
        return redirect()->route('metodo-pago.index');
    }

    public function unactive_payment($payment_id)
    {
        Payment::where('payment_id',$payment_id)->update(['publication_status' => 0]);
        Session::put('message','Método de pago desactivado exitosamente !!');
        return redirect()->route('metodo-pago.index');
    }
}
