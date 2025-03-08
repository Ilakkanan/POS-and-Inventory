<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::id()){
            $user=Auth::user();
            $usertype=Auth()->user()->usertype;
            if($usertype=='cashier'){
                return view('cashier.dashboard',compact('user'));
            }elseif($usertype=='admin'){
                return view('admin.dashboard',compact('user'));
            }elseif($usertype=='superadmin'){
                return view('superAdmin.dashboard',compact('user'));
            }else{
                return redirect()->back();
            }
        }
    }
}
