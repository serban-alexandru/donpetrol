<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Validator;
use App\Category;

class ProductsController extends Controller
{
    
    public function index(){

        $products = Product::paginate(20);
        $categories = Category::all();

        return view('admin.products')->with([
            'products' => $products,
            'categories' => $categories,
        ]);

    }

    /**
     * Function that creates a product
     */
    public function add(Request $request){

        // data validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'price' => 'required',
            'table_number' => 'required|string',
            'table_part' => 'required|string',
            'category_id' => 'required|integer|min:1',
        ]);

        // check if data is valid
        if($validator->fails()){
            return redirect()->back()->with('error', 'Invalid data sent!');
        }

        // create product
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->table_number = $request->table_number;
        $product->table_part = $request->table_part;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->back()->with('success', 'Product added!');

    }

    /**
     * Function that edits a product
     */
    public function edit(Request $request, $product_id){

        // data validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'price' => 'required',
            'table_number' => 'required|string',
            'table_part' => 'required|string',
        ]);

        // check if data is valid
        if($validator->fails()){
            return redirect()->back()->with('error', 'Invalid data sent!');
        }

        $product = Product::find($product_id);

        // check if product exists
        if($product){
            $product->name = $request->name;
            $product->price = $request->price;
            $product->table_number = $request->table_number;
            $product->table_part = $request->table_part;
            $product->save();
    
            return redirect()->back()->with('success', 'Product edited!');
        }
        
        // case product does not exist
        return redirect()->back()->with('error', 'Prduct not found!');

    }

    /**
     * Function that deletes a product
     */
    public function delete($product_id){

        $product = Product::find($product_id);

        // check if product exists
        if($product){

            $product->delete();
            return redirect()->back()->with('success', 'Product deleted!');

        }

        // case product does not exist
        return redirect()->back()->with('error', 'Prduct not found!');

    }

}
