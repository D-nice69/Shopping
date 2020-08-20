<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CarbonCarbon;

class AdminController extends Controller
{
    public function getadmin()
    {
        return view('admin.home');
    }
}
