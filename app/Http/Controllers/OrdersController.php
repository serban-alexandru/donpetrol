<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Validator;
use App\CartItem;
use Auth;

class OrdersController extends Controller
{
    
    public function index(){

        $categories = Category::all();

        return view('admin.orders')->with([
            'categories' => $categories,
        ]);

    }
    
    /**
     * Function that adds a product to cart
     */
    public function add(Request $request, $product_id){

        $product = Product::find($product_id);

        // data validator 
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        // case validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'You have to add at least one item in your cart');
        }

        // check if product exists
        if($product){
            
            $cartItem = new CartItem;
            $cartItem->quantity = $request->quantity;
            $cartItem->product_id = $product_id;
            $cartItem->user_id = Auth::user()->id;
            $cartItem->save();

            return redirect()->back()->with('success', 'Product added to cart');

        }

        // case product not found
        return redirect()->back()->with('error', 'Product not found');

    }

}
