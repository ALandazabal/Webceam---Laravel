<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $all_published_product=DB::table('products')
                ->join('categories','products.category_id','=','categories.category_id')                    
                ->select('products.*','categories.category_name')
                ->where('products.publication_status', 1)
                ->limit(9)
                ->get();
        $manage_published_product=view('pages.home_content')
            ->with('all_published_product',$all_published_product);
        return view('layout')
            ->with('pages.home_content',$manage_published_product);
    }
}
