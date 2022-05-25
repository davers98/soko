<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ProductCategories extends Controller
{
    //

    public function category(){
        return view('home.category');

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
}
