<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Products;
use Cart;
class ProductController extends Controller
{
    public function __construct()
    {
        $cart= Cart::content();
        $prod = DB::table('vp_producttype')->get();
         view()->share(compact('prod','cart'));
    }
    public function getproduct($id)
    {
        $product = DB::table('vp_products')
                    ->where('prod_id',$id)
                    ->get();
        $product_suggestions = DB::table('vp_products')
                        ->inRandomOrder()
                        ->limit(15)
                        ->get();             
        return view('page.product',compact('product','product_suggestions'));
    }
}
