<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use Session;
use Illuminate\Session\Store;
use App\Category;
use Auth;
use App\Order;

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

      $openCat = 1;
      if(Session::has('openCat')){
        $openCat = Session::get('openCat');
      }

      $categories = Category::all();

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

    }
    $nr = $last_orders[$last_orders->count() - 1]->id;
    $sum = number_format($sum , 2);

    $mollie = new \Mollie\Api\MollieApiClient();
    // Test Key
    $mollie->setApiKey("test_MDHCmNRtRuaCt5gwtFJQ29QfSMBf4n");
    // Live API key
    // $mollie->setApiKey("live_xBwjKC5AAtExkG2tbN5jqtekvfmh29");

    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $sum,
        ],
        "description" => "Order #".$nr,
        "redirectUrl" => url('/payment_success/'.$orderr->secret),
        "webhookUrl"  => "https://webshop.example.org/mollie-webhook/",
    ]);
    // return $payment;
    return redirect($payment->_links->checkout->href);

  }

  public function paymentSuccess($secret){

    $order = Order::where('secret', '=', $secret)->first();

    return view('paymentSuccess')->with([
      'order' => $order,
    ]);

  }

}

