<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
class CategoryController extends Controller
{
    public function __construct()
    {
        $cart = Cart::content();  
        $prod = DB::table('vp_producttype')->get();
        view()->share(compact('prod','cart'));
    }
    public function getcategory($id,Request $request)
    {
        $product_category = DB::table('vp_products')
                            ->where('prod_cate', $id)
                            ->paginate(10);     
        $category_laptop = DB::table('vp_categories')
                            ->where('id_ptye',2) 
                            ->get(); 
        $category_sach = DB::table('vp_categories')
                            ->where('id_ptye',7) 
                            ->get();     
        $category_dienthoai = DB::table('vp_categories')
                            ->where('id_ptye',1) 
                            ->get();                                                                                        
        return view('page.category', compact('product_category','category_laptop','category_sach','category_dienthoai')); 
    }
}
