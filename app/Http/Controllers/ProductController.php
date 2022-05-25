<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function product(){
        return view('home.admin');
    }

    public function addProduct(Request $request)
    {
        $product = new Products;

        $product->productname = $request->input('productname');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->units = $request->input('units');
        $product->price = $request->input('price');
        //$imageFile = [];
        foreach(array($request->file('image')) as $imageFile){
            $fileName = date('YmHi').$imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
          //  $product->image = $imageFile->store('image','images');
            $product['image'] = $fileName;
        }
        $product->save();
        return redirect('dashboard');
    }
}
