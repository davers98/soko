<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\User;

class BusinessController extends Controller
{
    //
    public function index(){
        $business = Business::all();
    }

    public function add(Request $request)
    {
        $business = new Business;

        if($request->input('user')=== User::findOrFail()){

        }


    }
}
