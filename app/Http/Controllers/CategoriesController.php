<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    
    public function index(){

        $categories = Category::where('category_id', '=', NULL)->paginate(20);

        return view('admin.categories')->with([
            'categories' => $categories,
        ]);

    }

    public function category($category_id){

        $category = Category::find($category_id);

        if($category){

            return $category;

        }

        return redirect()->back()->with('error', 'This category does not exist');

    }

}
