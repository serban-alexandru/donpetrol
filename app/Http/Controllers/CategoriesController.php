<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    
    public function index(){

        $categories = Category::paginate(20);

        return view('admin.categories')->with([
            'categories' => $categories,
        ]);

    }

}
