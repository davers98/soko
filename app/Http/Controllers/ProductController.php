<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function product(){
        $items = Category::all(["id","category"]);
        $products = Products::paginate(5);
        return view('home.product', compact('items','products'));
    }

    public function edit($id){
        $products = Products::findOrFail($id);
        $items = Category::all();
        return view('home.edit',compact('products','items'));
    }

    public function update(Request $request, $id)
    {
        $products = Products::findOrFail($id);

        $products->productname = $request->input('productname');
        $products->description = $request->input('description');
        $products->category = $request->input('category');
        $products->units = $request->input('units');
        $products->price = $request->input('price');
        foreach(array($request->file('image')) as $imageFile){
            $fileName = date('YmHi').$imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
            $products['image'] = $fileName;
        }
        $products->update();
        return redirect('dashboard/products');

    }

    public function addProduct(Request $request)
    {
        $product = new Products;

        $product->productname = $request->input('productname');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->units = $request->input('units');
        $product->price = $request->input('price');
        foreach(array($request->file('image')) as $imageFile){
            $fileName = date('YmHi').$imageFile->getClientOriginalName();
            $imageFile->move(public_path('images'), $fileName);
            $product['image'] = $fileName;
        }
        $product->save();
        return redirect('dashboard/products');
    }

    public function destroy(Request $request, $id){

        $products = Products::findOrFail($id);

        $products->id =$request->input('id');
        $products->delete();

        return redirect('dashboard/products');
    }
}
