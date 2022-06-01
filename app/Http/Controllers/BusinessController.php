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
        $users = User::all();

        return view('home.business', compact('businesses','users'));
    }

    public function add(Request $request)
    {
        $business = new Business;

        $business->name = $request->input('name');
        $business->user = $request->input('user');
        $business->businesstype = $request->input('businesstype');
        $business->overview = $request->input('overview');
        $business->location = $request->input('location');
        $business->save();

        return redirect('dashboard/businesses');

    }

    public function update(Request $request, $id)
    {
        $business = Business::findOrFail($id);
        $business->name = $request->input('name');
        $business->user = $request->input('user');
        $business->businesstype = $request->input('businesstype');
        $business->overview = $request->input('overview');
        $business->location = $request->input('location');
        $business->update();

        return redirect('dashboard/businesses');
    }

}
