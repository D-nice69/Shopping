<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function __construct()
    {
        $prod = DB::table('vp_producttype')->get();        
        view()->share(compact('prod'));
    }

    public function search(){
        $search = input::get('search');
        $product = Products::where('prod_name','like','%'.$search.'%')
                            ->orwhere('prod_products','like','%'.$search.'%')
                            ->orwhere('prod_description','like','%'.$search.'%')
                            ->take(30)->paginate(5);
        return view('page.search',compact('product'));
    } 
}
