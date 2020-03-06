<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Validator;

class CategoriesController extends Controller
{
    
    public function index(){

        $categories = Category::where('category_id', '=', NULL)->paginate(20);

        return view('admin.categories')->with([
            'categories' => $categories,
        ]);

    }

    public function edit(Request $request, $category_id){

        $category = Category::find($category_id);

        // data validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'icon' => 'required|string|max:191',
            // 'description' => 'required|string|max:500',
        ]);

        // case validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'Invalid data sent');
        }

        if($category){

            $category->name = $request->name;
            $category->icon = $request->icon;
            $category->description = $request->description ?? '';
            $category->save();

            return redirect()->back()->with('success', 'Category modified');

        }

        return redirect()->back()->with('error', 'This category does not exist');

    }

    public function category($category_id){

        $category = Category::find($category_id);

        if($category){

            if($category->subcategories->count() == 0){

                $products = Product::where('category_id', '=', $category->id)->paginate(20);
                return view('admin.productsInCategory')->with([
                    'category' => $category,
                    'products' => $products,
                ]);

            }else{
                return view('admin.category')->with([
                    'category' => $category,
                ]);
            }

        }

        return redirect()->back()->with('error', 'This category does not exist');

    }

}
