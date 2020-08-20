<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProductType;
use Cart;
class IndextController extends Controller
{
    public function __construct()
    {
        $prod = DB::table('vp_producttype')->get();
        $product_slide = DB::table('vp_products')
                        ->where('sale','>','5')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
        $product_slide_1 = DB::table('vp_products')
                        ->where('sale','>','7')
                        ->inRandomOrder()
                        ->limit(2)
                        ->get();     
         view()->share(compact('prod','product_slide','product_slide_1'));
    }
    public function getindex()
    {
        $product_new = DB::table('vp_products')
                        ->inRandomOrder()
                        ->orderBy('id_ptye','desc')
                        ->get();
        $product_sale = DB::table('vp_products')
                        ->where('sale','>','0')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $product_random = DB::table('vp_products')
                        ->inRandomOrder()
                        ->get();
        $product_laptop = DB::table('vp_products')
                        ->where('id_ptye','2')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $category_laptop = DB::table('vp_categories')
                        ->where('id_ptye','2')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $product_tv = DB::table('vp_products')
                        ->where('id_ptye','5')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $product_dienthoai = DB::table('vp_products')
                        ->where('id_ptye','1')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $product_sach = DB::table('vp_products')
                        ->where('id_ptye','7')
                        ->orderBy('id_ptye','desc')
                        ->get();
        $cart= Cart::instance('shopping')->content(); 
        return view('page.master',compact('product_sach','product_new',
                                        'product_sale','product_random',
                                        'product_laptop','product_sale',
                                        'category_laptop','product_tv',
                                        'product_dienthoai','cart'));

    }
}
