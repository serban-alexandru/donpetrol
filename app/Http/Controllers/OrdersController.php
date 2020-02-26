<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Validator;
use App\CartItem;
use Auth;
use App\Order;
use App\OrderHasProduct;

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

    /**
     * Send order route
     */
    public function send(Request $request){

        // data validator 
        $validator = Validator::make($request->all(), [
            'type' => 'required|integer|min:1|max:2', // 1 - eat in / 2 - take out
            'time' => 'required|string', 
        ]);

        // check if data is valid
        if($validator->fails()){
            return redirect()->back()->with('error', 'Invalid data sent!');
        }

        $order = new Order;
        $order->type = $request->type;
        $order->date = $request->time;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach(Auth::user()->cartItems as $item){

            $product = new OrderHasProduct;
            $product->order_id = $order->id;
            $product->product_id = $item->product_id;
            $product->quantity = $item->quantity;
            $product->save();

            $item->delete();

        }

        return redirect()->back()->with('success', 'Order sent!');

    }

}
