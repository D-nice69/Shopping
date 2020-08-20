<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Products;
class WishController extends Controller
{
    public function __construct()
        {
            $prod = DB::table('vp_producttype')->get();        
            view()->share(compact('prod'));
        }
    public function addwishlist($id){
        
             $product = Products::find($id);
             if($product->sale == 0){
                   $price = $product->prod_price;
             }   
            else{
                 $price =(($product->prod_price)-(($product->prod_price)*($product->sale))/100);
             }
            Cart::instance('wishlist')->add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $price, 'options' => ['img' => $product->prod_img]]);
            return back();
    }
    public function showwishlist(){
        $cart = Cart::instance('wishlist')->content();
        return view('page.wishlist',compact('cart'));
    }
    public function deletewishlist($id){
        if($id = 'all'){
            Cart::instance('wishlist')->destroy();
        }
        else{
            Cart::instance('wishlist')->remove();
        }
        return back();
    }
}
