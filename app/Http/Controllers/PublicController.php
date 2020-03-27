<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use Session;
use Illuminate\Session\Store;
use App\Category;
use Auth;
use App\Order;
use Mail;

class PublicController extends Controller
{
    
    public function soap(){
        
        $xml_data = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:TPAPIPosIntfU-ITPAPIPOS">
        <soapenv:Header/>
        <soapenv:Body>
           <urn:GetArticles soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
              <Request xsi:type="urn:TGetArticlesRequest" xmlns:urn="urn:TPAPIPosIntfU">
             <Password xsi:type="xsd:string">ZrUrF5kSUffN46PWkgxa</Password>
                 <UserName xsi:type="xsd:string">Futurize</UserName>
                 <AppToken xsi:type="xsd:string">yXsHPq2w3Xus</AppToken>
                 <AppName xsi:type="xsd:string">unTill Test</AppName>
                 <SalesAreaId xsi:type="xsd:long">5000000208</SalesAreaId>
              </Request>
           </urn:GetArticles>
        </soapenv:Body>
     </soapenv:Envelope>';
        $URL = "http://testapi.untill.com:3063/soap/ITPAPIPOS";

        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);


        print_r($output);

    }

    public function choose(){

      return view('choose');

    }

    public function eatIn(){
      Session::put('order_type', 'eat_in');

      return redirect('/menu');
    }

    public function takeAway(){
      Session::put('order_type', 'take_away');

      return redirect('/menu');
    }

    public function unsetType(){
      Session::forget('order_type');

      return redirect('/menu');
    }

    public function menu(){

      $openCat = 2;
      if(Session::has('openCat')){
        $openCat = Session::get('openCat');
      }

      $categories = Category::all()->reverse();

      return view('menu')->with([
          'categories' => $categories,
          'openCat' => $openCat,
      ]);

  }

  public function payTest(){

    $last_orders = Auth::user()->orders;

    $order_products = $last_orders[$last_orders->count() - 1]->products;

    $orderr = $last_orders[$last_orders->count() - 1];

    if($order_products->count() < 1){
      return redirect('/checkout')->with('error', 'Your order is empty');
    }

    $sum = 0;
    foreach($order_products as $order_product){

      $sum += $order_product->quantity * $order_product->product->price;
      $sum += $order_product->potatoes * env("FRIES_PRICE");
      $sum += $order_product->mayo * env("MAYO_PRICE");

    }
    $nr = $last_orders[$last_orders->count() - 1]->id;
    $sum = number_format($sum , 2);

    $mollie = new \Mollie\Api\MollieApiClient();
    // Test Key
    // $mollie->setApiKey("test_MDHCmNRtRuaCt5gwtFJQ29QfSMBf4n");
    // Live API key
    $mollie->setApiKey("live_xBwjKC5AAtExkG2tbN5jqtekvfmh29");

    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $sum,
        ],
        "description" => "Order #".$nr,
        "redirectUrl" => url('/payment_success/'.$orderr->secret),
        "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
    ]);
    // return print_r($payment);
    try{
      return redirect($payment->_links->checkout->href);
    }catch(Exception $e){
      return 'fail';
    }
  }

  public function paymentSuccess($secret){

    $order = Order::where('secret', '=', $secret)->first();

    if($order){

      if($order->confirmation_email == 0){
        $order->confirmation_email = 1;
        $user = Auth::user();
        $message = new \stdClass();
        $message->link = url('/payment_success/'.$secret);
        Mail::send('email.message', ['msg' => $message], function ($m) use ($user) {
            $m->from('donpetrolapp@gmail.com', '🔺Your order!🔺');
  
            $m->to(Auth::user()->email, Auth::user()->email)
                ->subject('🔺Your order!🔺');
        });
      }
      
      $order->paid = 1;
      $order->save();
    }else{
      return redirect('/')->with('error', 'Invalid code');
    }
    if($order->payment_method == 'cash'){
      // return 1;
      // return $order->products;
      return view('paymentSuccessCash')->with([
        'order' => $order,
      ]);
    }
    return view('paymentSuccess')->with([
      'order' => $order,
    ]);

  }

  public function closed(){

    return view('serviceClosed');

  }

}

