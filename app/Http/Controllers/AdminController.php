<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function LoginAdmin()
    {
        if(auth()->check()){
            return redirect()->to('Homepage');
        }

        return view('login');
    }
    public function PostLoginAdmin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            return redirect()->to('Homepage');
        }
    }
}
