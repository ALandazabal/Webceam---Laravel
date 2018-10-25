<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.all_product', compact('products'));
    }

    public function inicio($user_id)
    {
        $products = Product::where('user_id', $user_id);

        return view('product.all_product', compact('products', 'user_id'));
    }

    public function all_products($user_id)
    {
        $products = Product::all();

        return view('product.all_product', compact('products', 'user_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = null;
        return view('product.add_product', compact('product'));
    }

    public function crear($user_id)
    {
        $product = null;
        return view('product.add_product', compact('product', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Product();
        
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/image/',$name);            
        }

        $producto->product_image = $name;
        $producto->product_id = $request->product_id;
        $producto->category_id = $request->category_id;
        $producto->manufacture_id = $request->manufacture_id;
        $producto->user_id = $request->user_id;
        $producto->product_name = $request->input('product_name');
        $producto->product_price = $request->input('product_price');
        $producto->product_color = $request->input('product_color');
        $producto->product_quantity = $request->input('product_quantity');
        $producto->product_short_description = $request->input('product_short_description');
        $producto->product_long_description = $request->input('product_long_description');
        $producto->product_long_description = $request->input('product_send_conditions');
        if($request->input('publication_status') == null)
            $producto->publication_status = 0;
        else
            $producto->publication_status = 1;
        
        $producto->save();
        
        $product = Product::where('product_name',$request->input('product_name'))->first();

        $payments = $request->input('all_published_payment');
        foreach($payments as $pay){
            DB::table('product_payment')->insert(
                ['product_id' => $product->product_id, 'payment_id' => $pay]
            );
        }

        /*return redirect()->route('producto.inicio');*/
        $products = Product::all();
        $user_id = $request->user_id;
        return view('product.all_product', compact('products', 'user_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $product = Product::where('product_id', '=', $product_id)->firstOrFail();
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $product = Product::where('product_id',$product_id)->first();
        return view('product.edit_product', compact('product'));

    }
    public function editar($product_id, $user_id)
    {
        $product = Product::where('product_id',$product_id)->first();
        return view('product.edit_product', compact('product', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $data = array();
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_name']=$request->product_name;        
        $data['product_price']=$request->product_price;
        $data['product_color']=$request->product_color;
        $data['product_quantity']=$request->product_quantity;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        if($request->publication_status == null)
            $data['publication_status']=0;
        else
            $data['publication_status']=1;
        
        $image=$request->file('product_image');
        if ($image) {
            $product_info=DB::table('tbl_product')
                ->where('product_id',$product_id)
                ->first();
       
            \File::delete($product_info->product_image);

           $image_name=str_random(20);
           $ext=strtolower($image->getClientOriginalExtension());
           $image_full_name=$image_name.'.'.$ext;
           $upload_path='image/';
           $image_url=$upload_path.$image_full_name;
           $success=$image->move($upload_path,$image_full_name);

        }

        $prodPay = DB::table('product_payment')->where('product_id', $product_id)->delete();

        $payments = $request->input('all_published_payment');
        foreach($payments as $pay){
            DB::table('product_payment')->insert(
                    ['product_id' => $product_id, 'payment_id' => $pay]
            );
            echo $pay;
        }
        
        Product::where('product_id',$product_id)->update($data);
        
        /*return redirect()->route('/producto/all/', ['user_id' => $request->user_id]);*/
        $products = Product::all();
        $user_id = $request->user_id;
        return view('product.all_product', compact('products', 'user_id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $product = Product::where('product_id',$product_id)->first();

        $file_path =  public_path().'/image/'.$product->product_image;
        \File::delete($file_path);

        $product = Product::where('product_id',$product_id)->delete();
        Session::put('message','Producto eliminado exitosamente !!');
        return redirect()->route('producto.index');
    }

    public function active_product($product_id, $user_id)
    {
        Product::where('product_id',$product_id)->update(['publication_status' => 1]);
        Session::put('message','Producto activado exitosamente !!');
        /*return redirect()->route('producto.inicio');*/
        $products = Product::all();
        return view('product.all_product', compact('products', 'user_id'));
    }

    public function unactive_product($product_id, $user_id)
    {
        Product::where('product_id',$product_id)->update(['publication_status' => 0]);
        Session::put('message','Producto desactivado exitosamente !!');
        /*return redirect()->route('producto.inicio');*/
        $products = Product::all();
        return view('product.all_product', compact('products', 'user_id'));
    }
}
