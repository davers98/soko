<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Validator;

class ProductController extends Controller
{
    //

    public function product(){
       // $items = Category::all(["id","category"]);
        $products = Products::all();
        return response()->json([ProductResource::collection($products), 'Products Fetched']);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'productname' => 'required|string|max:255',
            'description' => 'required|string',
            'units'=>'required|int',
            'price'=>'required|int',
            'category'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        foreach(array($request->file()) as $imageFile) {
            $fileName = date('YmHi') . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
            $product['image'] = $fileName;
        }
        $product = Products::create([
             'productname'=>$request->productname,
             'description'=>$request->description,
             'category'=>$request->category,
             'units'=>$request->units,
             'price'=>$request->price,
             'image'=>$request->image,
        ]);



        return response()->json(['Product added Successfull.', new ProductResource($product)]);
    }

    public function show($id){
        $product = Products::find($id);
        if(is_null($product)){
            return response()->json(['Data not Found', 404]);
        }
        return response()->json([new ProductResource($product)]);
    }

    public function update(Request $request, Products $products){


        $validator = Validator::make($request->all(),[
            'productname' => 'required|string|max:255',
            'description' => 'required|string',
            'units'=>'required|int',
            'price'=>'required|int',
            'category'=>'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }


        foreach(array($request->file()) as $imageFile) {
            $fileName = date('YmHi') . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
            $product['image'] = $fileName;
        }
        $product = Products::create([
            'productname'=>$request->productname,
            'description'=>$request->description,
            'category'=>$request->category,
            'units'=>$request->units,
            'price'=>$request->price,
            'image'=>$request->image,
        ]);



        return response()->json(['Product added Successfull.', new ProductResource($product)]);
    }





}
