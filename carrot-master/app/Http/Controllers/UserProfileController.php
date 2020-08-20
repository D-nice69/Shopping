<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\UserProfile;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $cart = Cart::content();  
        $prod = DB::table('vp_producttype')->get();
        view()->share(compact('prod','cart'));
    }
    public function get(){
        if(Auth::check() != null){
            $id = Auth::user()->id;
            $profile = UserProfile::where('id_user',$id)->get();
            return view('page.profile',compact('profile'));
        }
    }
    public function getbill(){
        if(Auth::check() != null){
            $id = Auth::user()->id;
            $historybill = DB::table('bill_detail')->where('id_user',$id)->get();
            return view('page.historybill',compact('historybill'));
        }
    }
}
