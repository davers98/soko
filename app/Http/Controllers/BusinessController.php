<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\User;

class BusinessController extends Controller
{
    //
    public function index(){
        $businesses = Business::all();

        return view('home.business', compact('businesses'));
    }

    public function add(Request $request)
    {
        $business = new Business;



        $business->name = $request->input('name');
        $business->overview = $request->input('overview');
        $business->businesstype = $request->input('type');
        $business->location = $request->input('location');
        $business->user = $request->input('user');

        $business->save();
        return redirect('dashboard/businesses');


    }
}
