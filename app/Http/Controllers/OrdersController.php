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

        $openCat = 2;
        if(Session::has('openCat')){
          $openCat = Session::get('openCat');
        }
  
        $categories = Category::all();
  
        return view('admin.orders')->with([
            'categories' => $categories,
            'openCat' => $openCat,
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
            Session::put('openCat', $product->category_id);
            // Subcategory case
            if($product->category->category_id){
                Session::put('openCat', $product->category->category_id);
            }
            if(Auth::user()){

                $cartItems = Auth::user()->cartItems;
                foreach($cartItems as $item){
                    if($item->product_id == $product->id){
                        // case product already exists in cart
                        $item->quantity += $request->quantity;
                        $item->potatoes += $request->potatoes;
                        $item->mayo += $request->mayo;
                        $item->save();
    
                        return redirect()->back()->with('success', 'Product toegevoegd aan uw bestelling');
                    }
                }
    
                $cartItem = new CartItem;
                $cartItem->quantity = $request->quantity;
                $cartItem->potatoes = $request->potatoes;
                $cartItem->mayo = $request->mayo;
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
                            $item->potatoes += $request->potatoes;
                            $item->mayo += $request->mayo;

                            return redirect()->back()->with('success', 'Product toegevoegd aan uw bestelling');
                        }
                    }

                    $cartItem = new \stdClass();
                    $cartItem->quantity = $request->quantity;
                    $cartItem->potatoes = $request->potatoes;
                    $cartItem->mayo = $request->mayo;
                    $cartItem->product_name = $product->name;
                    $cartItem->product_id = $product->id;
                    $cartItem->product_price = $product->price;

                    $cartItems = Session::get('cartItems');
                    array_push($cartItems, $cartItem);
                    Session::put('cartItems', $cartItems);

                }else{

                    $cartItem = new \stdClass();
                    $cartItem->quantity = $request->quantity;
                    $cartItem->potatoes = $request->potatoes;
                    $cartItem->mayo = $request->mayo;
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
                        $item->potatoes = $request->potatoes;
                        $item->mayo = $request->mayo;
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
                            $item->potatoes = $request->potatoes;
                            $item->mayo = $request->mayo;
        
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
        // if($request->payment_method != 'cash' && $request->payment_method != 'online'){
        //     return redirect()->back()->with('error', 'Select payment method');
        // } 

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
            // 'payment_method' => 'required|string|max:191',
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
            $product->potatoes = $item->potatoes;
            $product->mayo = $item->mayo;
            $product->save();

            $item->delete();

        }

        // return $order;

        // if($request->payment_method == 'cash'){
        //     return redirect('/payment_success/'.$order->secret)->with('success', 'Order sent!');
        // }

        return redirect('/mollie');

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
                    $cartItem->potatoes = $item->potatoes;
                    $cartItem->mayo = $item->mayo;
                    $cartItem->save();
                    
                }

                Session::forget('cartItems');

            }

        }

        return redirect()->back();

    }

    public function orders(){

        $orders = Order::all()->reverse();

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

    public function print(Request $request, $order_id){

        $order = Order::find($order_id);

        if(!$order){
            return redirect()->back()->with('error', 'Order not found');
        }

        // return $order->products;

        $potatoes = 0;
        $mayo = 0;
            
        foreach($order->products as $product){
            $potatoes += $product->potatoes;
            $mayo += $product->mayo;
        }

        $xml_all_items = '';

        if($potatoes > 0){
            $xml_potato = '
            <item xsi:type="urn:TOrderItem">
                <ArticleId xsi:type="xsd:long">10000000513</ArticleId>
                <ManualPrice xsi:type="xsd:double">'.env("FRIES_PRICE").'</ManualPrice>
                <OrderItemType xsi:type="xsd:int">0</OrderItemType>
                <ArticleNumber xsi:type="xsd:int">601</ArticleNumber>
                <ArticleName xsi:type="xsd:string">Extra Frietjes</ArticleName>
                <DepartmentId xsi:type="xsd:long">10000000499</DepartmentId>
                <DepartmentNumber xsi:type="xsd:int">20</DepartmentNumber>
                <DepartmentName xsi:type="xsd:string">Suppl. Keuken</DepartmentName>
                <GroupName xsi:type="xsd:string">4.Keuken</GroupName>
                <CategoryName xsi:type="xsd:string">2.Keuken</CategoryName>
                <Quantity xsi:type="xsd:int">'.$potatoes.'</Quantity>
                <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
                <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
            </item>
            ';
            $xml_all_items .=$xml_potato;
        }
        
        if($mayo > 0){
            $xml_mayo  ='
            <item xsi:type="urn:TOrderItem">
                <ArticleId xsi:type="xsd:long">10000000563</ArticleId>
                <ArticleName xsi:type="xsd:string">Extra Mayo</ArticleName>
                <ArticleNumber xsi:type="xsd:int">603</ArticleNumber>            
                <ManualPrice xsi:type="xsd:double">'.env("MAYO_PRICE").'</ManualPrice>
                <OrderItemType xsi:type="xsd:int">0</OrderItemType>
                <DepartmentId xsi:type="xsd:long">10000000499</DepartmentId>
                <DepartmentNumber xsi:type="xsd:int">20</DepartmentNumber>
                <DepartmentName xsi:type="xsd:string">Suppl. Keuken</DepartmentName>
                <GroupName xsi:type="xsd:string">4.Keuken</GroupName>
                <CategoryName xsi:type="xsd:string">2.Keuken</CategoryName>
                <Quantity xsi:type="xsd:int">'.$mayo.'</Quantity>
                <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
                <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
            </item>
            ';
            $xml_all_items .=$xml_mayo;
        }

        // Item example
        // <item xsi:type="urn:TOrderItem">
        //     <ArticleId xsi:type="xsd:long">5000001013</ArticleId>
        //     <PriceId xsi:type="xsd:long">5000000206</PriceId>
        //     <OrderItemType xsi:type="xsd:int">0</OrderItemType>
        //     <ArticleNumber xsi:type="xsd:int">201</ArticleNumber>
        //     <ArticleName xsi:type="xsd:string">Koffie</ArticleName>
        //     <DepartmentId xsi:type="xsd:long">5000000171</DepartmentId>
        //     <DepartmentNumber xsi:type="xsd:int">3</DepartmentNumber>
        //     <DepartmentName xsi:type="xsd:string">Hot</DepartmentName>
        //     <GroupName xsi:type="xsd:string">1.Without Alcohol</GroupName>
        //     <CategoryName xsi:type="xsd:string">1.Bar</CategoryName>
        //     <Quantity xsi:type="xsd:int">1</Quantity>
        //     <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
        //     <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
        // </item>
        
        // Fries
        // <item xsi:type="urn:TOrderItem">
        //     <ArticleId xsi:type="xsd:long">10000000513</ArticleId>
        //     <ManualPrice xsi:type="xsd:double">.env("FRIES_PRICE").</ManualPrice>
        //     <OrderItemType xsi:type="xsd:int">0</OrderItemType>
        //     <ArticleNumber xsi:type="xsd:int">601</ArticleNumber>
        //     <ArticleName xsi:type="xsd:string">Extra Frietjes</ArticleName>
        //     <DepartmentId xsi:type="xsd:long">10000000499</DepartmentId>
        //     <DepartmentNumber xsi:type="xsd:int">20</DepartmentNumber>
        //     <DepartmentName xsi:type="xsd:string">Suppl. Keuken</DepartmentName>
        //     <GroupName xsi:type="xsd:string">4.Keuken</GroupName>
        //     <CategoryName xsi:type="xsd:string">2.Keuken</CategoryName>
        //     <Quantity xsi:type="xsd:int">.$potatoes.</Quantity>
        //     <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
        //     <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
        // </item>

        //Mayo
        // <item xsi:type="urn:TOrderItem">
        //     <ArticleId xsi:type="xsd:long">10000000563</ArticleId>
        //     <ArticleName xsi:type="xsd:string">Extra Mayo</ArticleName>
        //     <ArticleNumber xsi:type="xsd:int">603</ArticleNumber>            
        //     <ManualPrice xsi:type="xsd:double">.env("MAYO_PRICE").</ManualPrice>
        //     <OrderItemType xsi:type="xsd:int">0</OrderItemType>
        //     <DepartmentId xsi:type="xsd:long">10000000499</DepartmentId>
        //     <DepartmentNumber xsi:type="xsd:int">20</DepartmentNumber>
        //     <DepartmentName xsi:type="xsd:string">Suppl. Keuken</DepartmentName>
        //     <GroupName xsi:type="xsd:string">4.Keuken</GroupName>
        //     <CategoryName xsi:type="xsd:string">2.Keuken</CategoryName>
        //     <Quantity xsi:type="xsd:int">.$mayo.</Quantity>
        //     <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
        //     <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
        // </item>

        // start xml creation

        // $xml_data = '
        $item = 'asd';
        $item .='aaa';
        // return $item;
        // return $xml_all_items;
        // return $order->products;
        // return $order->products[0]->product;

        foreach($order->products as $product){

            $xml_item = '
                <item xsi:type="urn:TOrderItem">
                    <ArticleId xsi:type="xsd:long">'.$product->product->article_id.'</ArticleId>
                    <ManualPrice xsi:type="xsd:double">'.$product->product->price.'</ManualPrice>
                    <OrderItemType xsi:type="xsd:int">0</OrderItemType>
                    <ArticleNumber xsi:type="xsd:int">'.$product->product->article_number.'</ArticleNumber>
                    <ArticleName xsi:type="xsd:string">'.$product->product->article_name.'</ArticleName>
                    <DepartmentId xsi:type="xsd:long">'.$product->product->department_id.'</DepartmentId>
                    <DepartmentNumber xsi:type="xsd:int">'.$product->product->department_number.'</DepartmentNumber>
                    <DepartmentName xsi:type="xsd:string">'.$product->product->department_name.'</DepartmentName>
                    <GroupName xsi:type="xsd:string">'.$product->product->group_name.'</GroupName>
                    <CategoryName xsi:type="xsd:string">'.$product->product->group_name.'</CategoryName>
                    <Quantity xsi:type="xsd:int">'.$product->quantity.'</Quantity>
                    <SalesAreaNumber xsi:type="xsd:int">1</SalesAreaNumber>
                    <SalesAreaName xsi:type="xsd:string">Take Away</SalesAreaName>
                </item>
            ';
            $xml_all_items .= $xml_item;
        }


        $xml_top ='<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:TPAPIPosIntfU-ITPAPIPOS" xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/">
        <soapenv:Header/>
        <soapenv:Body>
            <urn:CreateOrder soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
                <Request xsi:type="urn:TCreateOrderRequest" xmlns:urn="urn:TPAPIPosIntfU">
                    <Password xsi:type="xsd:string">Gempemolen2016</Password>
                    <UserName xsi:type="xsd:string">TPAPI</UserName>
                    <AppToken xsi:type="xsd:string">c0JTU2baFYtc</AppToken>
                    <AppName xsi:type="xsd:string">Futurize</AppName>
                    <TableNumber xsi:type="xsd:int">'
                    .$request->table_number.
                    '</TableNumber>
                    <TablePart xsi:type="xsd:string">a</TablePart>';
                    

                    
                    $xml_items='<Items soapenc:arrayType="urn1:TOrderItem[1]" xsi:type="urn1:TOrderItemArray" xmlns:urn1="urn:TPAPIPosTypesU">
                        '.$xml_all_items.'
                    </Items>';
                    
                $xml_bottom='</Request>
            </urn:CreateOrder>
        </soapenv:Body>
        </soapenv:Envelope>
        ';
        
        $xml_top .= $xml_items;
        $xml_top .= $xml_bottom;
        // End xml creation
     $URL = "http://donpetrol.mine.nu:3063/soap/ITPAPIPOS";

        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_top");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        print_r($output);
        // return redirect()->back()->with('success', 'Order sent to POS');

    }

}
