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
use Session;
use App\User;

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
            
            if(Auth::user()){

                $cartItems = Auth::user()->cartItems;
                foreach($cartItems as $item){
                    if($item->product_id == $product->id){
                        // case product already exists in cart
                        $item->quantity += $request->quantity;
                        $item->save();
    
                        return redirect()->back()->with('success', 'Product toegevoegd aan uw bestelling');
                    }
                }
    
                $cartItem = new CartItem;
                $cartItem->quantity = $request->quantity;
                $cartItem->product_id = $product_id;
                $cartItem->user_id = Auth::user()->id;
                $cartItem->save();

            }else{
            
                // if there are products in this session
                if(Session::has('cartItems')){
                    foreach(Session::get('cartItems') as $item){
                        if($item->product_id == $product->id){
                            // case product already exists in cart
                            $item->quantity += $request->quantity;
        
                            return redirect()->back()->with('success', 'Product toegevoegd aan uw bestelling');
                        }
                    }

                    $cartItem = new \stdClass();
                    $cartItem->quantity = $request->quantity;
                    $cartItem->product_name = $product->name;
                    $cartItem->product_id = $product->id;
                    $cartItem->product_price = $product->price;

                    $cartItems = Session::get('cartItems');
                    array_push($cartItems, $cartItem);
                    Session::put('cartItems', $cartItems);

                }else{

                    $cartItem = new \stdClass();
                    $cartItem->quantity = $request->quantity;
                    $cartItem->product_name = $product->name;
                    $cartItem->product_id = $product->id;
                    $cartItem->product_price = $product->price;

                    Session::put('cartItems', array());
                    $cartItems = Session::get('cartItems');
                    array_push($cartItems, $cartItem);
                    Session::put('cartItems', $cartItems);

                }

            }           

            return redirect()->back()->with('success', 'Product toegevoegd aan uw bestelling');

        }

        // case product not found
        return redirect()->back()->with('error', 'Product not found');

    }

    /**
     * Function that edits the quantity of a product in cart 
     */
    public function edit(Request $request, $product_id){

        $product = Product::find($product_id);

        // data validator 
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
        ]);

        // case validator fails
        if($validator->fails()){
            return redirect()->back()->with('error', 'You have to add at least one item in your cart');
        }

        if($product){

            if(Auth::user()){

                $cartItems = Auth::user()->cartItems;
                foreach($cartItems as $item){
                    if($item->product_id == $product->id){
                        // case product exists in cart
                        $item->quantity = $request->quantity;
                        $item->save();

                        return redirect()->back()->with('success', 'Product quantity modified');
                    }
                }

            }else{

                // if there are products in this session
                if(Session::has('cartItems')){
                    foreach(Session::get('cartItems') as $item){
                        if($item->product_id == $product->id){
                            // case product already exists in cart
                            $item->quantity = $request->quantity;
        
                            return redirect()->back()->with('success', 'Product quantity modified');
                        }
                    }

                }

            }

            // case product is not in cart
            return redirect()->back()->with('error', 'This product is not in your cart');

        }

        // case product not found 
        return redirect()->back()->with('error', 'Product not found!');

    }

    public function delete($product_id){

        $product = Product::find($product_id);

        if($product){

            if(Auth::user()){

                $cartItems = Auth::user()->cartItems;
                foreach($cartItems as $item){
                    if($item->product_id == $product->id){
                        // case product exists in cart
                        $item->delete();

                        return redirect()->back()->with('success', 'Product removed from cart');
                    }
                }

            }else{

                // if there are products in this session
                if(Session::has('cartItems')){
                    foreach(Session::get('cartItems') as $key=>$item){
                        if($item->product_id == $product->id){
                            // case product already exists in cart
                            $cartItems = Session::get('cartItems');
                            unset($cartItems[$key]);
                            Session::put('cartItems', $cartItems);

                            return redirect()->back()->with('success', 'Product removed from cart');
                        }
                    }

                }

            }

            // case product is not in cart
            return redirect()->back()->with('error', 'This product is not in your cart');

        }

        // case product not found 
        return redirect()->back()->with('error', 'Product not found!');

    }

    /**
     * Generate random string
     */
    public static function quickRandom($length = 128)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * Send order route
     */
    public function send(Request $request){
        // return $request->payment_method;
        if($request->payment_method != 'cash' && $request->payment_method != 'online'){
            return redirect()->back()->with('error', 'Select payment method');
        } 

        $secret = $this->quickRandom();

        // data validator 
        $validator = Validator::make($request->all(), [
            // 'street_and_house' => 'required|string|max:191',
            // 'postcode' => 'required|string|max:191',
            // 'place_name' => 'required|string|max:191',
            'name' => 'required|string|max:191',
            'email' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            // 'company_name' => 'required|string|max:191',
            'payment_method' => 'required|string|max:191',
            'delivery_time' => 'required|string|max:191',
            // 'comments' => 'required|string|max:500',
        ]);

        // check if data is valid
        if($validator->fails()){
            return redirect()->back()->with('error', 'Invalid data sent!');
        }

        $order = new Order;
        $order->type = 'eat_in';
        $order->street_and_house = $request->street_and_house ?? '';
        $order->postcode = $request->postcode ?? '';
        $order->place_name = $request->place_name ?? '';
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();
        // $order->client_name = $request->name;
        // $order->email = $request->email;
        $order->phone = $request->phone;
        $order->payment_method = $request->payment_method;
        $order->delivery_time = $request->delivery_time;
        $order->comments = $request->comments ?? '';
        $order->user_id = Auth::user()->id;
        $order->secret = $secret;
        $order->save();

        // return $order;
        foreach(Auth::user()->cartItems as $item){

            $product = new OrderHasProduct;
            $product->order_id = $order->id;
            $product->product_id = $item->product_id;
            $product->quantity = $item->quantity;
            $product->save();

            $item->delete();

        }
        return redirect('/mollie');
        return redirect('/home')->with('success', 'Order sent!');

    }

    public function checkout(){

        if(Auth::user()){

            return view('checkout');

        }else{

            return redirect('/login')->with('error', 'You have to be logged in to be able to checkout');

        }

    }

    public function emptyCart(){

        if(Auth::user()){
            
             // if there are products in this session
            if(Session::has('cartItems')){
                // remove previous cart from last login
                foreach(Auth::user()->cartItems as $item){
                    $item->delete();
                }

                foreach(Session::get('cartItems') as $key=>$item){

                    $cartItem = new CartItem;
                    $cartItem->quantity = $item->quantity;
                    $cartItem->product_id = $item->product_id;
                    $cartItem->user_id = Auth::user()->id;
                    $cartItem->save();
                    
                }

                Session::forget('cartItems');

            }

        }

        return redirect()->back();

    }

    public function orders(){

        $orders = Order::all();

        $sum = 0;
        foreach($orders as $order){

            foreach($order->products as $product){

                $sum += $product->product->price;

            }

            $order->value = $sum;

        }

        return view('admin.allOrders')->with([
            'orders' => $orders,
        ]);

    }

    /** 
     * Delete order function
     */
    public function deleteOrder($order_id){

        $order = Order::find($order_id);
        
        if($order){

            $order->delete();
            
            return redirect()->back()->with('success', 'Order deleted');

        }

        return redirect()->back()->with('error', 'Order not found');

    }

}
