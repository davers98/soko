<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BusinessResource;
use App\Models\Business;

class BusinessController extends Controller
{
    //
    public function business(){
        // $items = Category::all(["id","category"]);
        $products = Business::all();
        return response()->json([BusinessResource::collection($products), 'Business Fetched']);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'overview' => 'required|string',
            'user'=>'required|string',
            'location'=>'required|string',
            'businesstype'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }



        $business = Business::create([
            'productname'=>$request->productname,
            'description'=>$request->description,
            'category'=>$request->category,
            'units'=>$request->units,
            'price'=>$request->price,
            'image'=>$request->image,
        ]);



        return response()->json(['Business added Successfull.', new BusinessResource($business)]);
    }
}
