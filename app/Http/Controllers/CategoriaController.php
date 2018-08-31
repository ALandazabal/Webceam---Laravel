<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.all_categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = null;
        return view('category.add_category', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->category_id = $request->category_id;
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        if($request->publication_status == null)
            $category->publication_status = '0';
        else
            $category->publication_status = '1';
        /*$category->publication_status = $request->publication_status;*/
        $category->save();
        return redirect()->route('categoria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::where('category_id',$category_id)->first();
        return view('category.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        
        $data = array();
        $data['category_name']=$request->category_name; 
        $data['category_description']=$request->category_description;
        if($request->publication_status == null)
            $data['publication_status'] = '0';
        else
            $data['publication_status'] = '1';
        /*$data['publication_status']=$request->publication_status;*/
        Category::where('category_id',$category_id)->update($data);
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = category::where('category_id',$category_id)->delete();
        Session::put('message','Categoría eliminada exitosamente !!');
        return redirect()->route('categoria.index');
    }
    public function active_category($category_id)
    {   
        Category::where('category_id',$category_id)->update(['publication_status' => 1]);
        Session::put('message','Categoría activada exitosamente !!');
        return redirect()->route('categoria.index');
    }

    public function unactive_category($category_id)
    {
        Category::where('category_id',$category_id)->update(['publication_status' => 0]);
        Session::put('message','Categoría desactivada exitosamente !!');
        return redirect()->route('categoria.index');
    }
}
