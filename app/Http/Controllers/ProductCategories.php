<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductCategories extends Controller
{
    //

    public function category(){
        $categories = Category::all();
        return view('home.category',compact('categories'));

    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->category = $request->input('category');
        $category->catdescription = $request->input('catdescription');
        $category->swacategory = $request->input('swacategory');
        $category->swacatdescription = $request->input('swacatdescription');
        $category->save();

        return redirect('dashboard/categories');

    }

    public function edit($id){
        $categories = Category::findOrFail($id);

        return view('home.editCat',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);

        $categories->category = $request->input('category');
        $categories->catdescription = $request->input('catdescription');
        $categories->swacategory = $request->input('swacategory');
        $categories->swacatdescription = $request->input('swacatdescription');
        $categories->update();
        return redirect('dashboard/categories');

    }
    public function destroy(Request $request, $id){

        $products = Category::findOrFail($id);

        $products->id =$request->input('id');
        $products->delete();

        return redirect()->back();
    }
}
