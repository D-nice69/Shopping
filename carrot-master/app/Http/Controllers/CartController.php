<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use Cart;

class CartController extends Controller
{
    
    public function __construct()
    {
        $prod = DB::table('vp_producttype')->get();       
        view()->share(compact('prod'));
    }
    public function addcart($id){
         $product = Products::find($id);
         if($product->sale == 0){
               $price = $product->prod_price;
         }   
        else{
             $price =(($product->prod_price)-(($product->prod_price)*($product->sale))/100);
         }
        Cart::instance('shopping')->add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $price, 'options' => ['img' => $product->prod_img]]);
        return back();
    }
    public function showcart(){
        $cart = Cart::instance('shopping')->content();
        return view('page.shoppingcart',compact('cart'));
    }
    public function deletecart($id){
        if($id = 'all'){
            Cart::instance('shopping')->destroy();
        }
        else{
            Cart::instance('shopping')->remove();
        }
        return back();
    }
    public function updatecart(Request $request){
        Cart::instance('shopping')->update($request->rowId,$request->qty);
    }
}
