<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Products;
use Illuminate\Http\Request;
use Cart;
use Validator;
use App\Bill;
use App\Customer;
use App\BillDetai;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function __construct()
    {
        $cart = Cart::content();
        $prod = DB::table('vp_producttype')->get();
        view()->share(compact('prod', 'cart'));
    }
    public function get()
    {
        $cart = Cart::instance('shopping')->content();
        return view('page.checkout', compact('cart'));
    }
    public function post(Request  $request)
    {
        $id = Auth::user()->id;
        $customer = new Customer;
        $customer->id_user= $id;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->andress= $request->andress;
        $customer->note = $request->note;
        $customer->save();
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = Cart::instance('shopping')->total();;
        $bill->save();

        $cart = Cart::instance('shopping')->content();
        foreach ($cart as $data) {    
            $detail = new BillDetai;
            $detail->id_user = $id;
            $detail->id_bill = $customer->id;
            $detail->id_product = $data->id;
            $detail->product_name = $data->name;
            $detail->quantity = $data->qty;
            $detail->price = $data->price;
            $detail->save();
        }
        Cart::destroy();
        return redirect('/');
    }
}
