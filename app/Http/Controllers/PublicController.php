<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use Session;
use Illuminate\Session\Store;

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

      return redirect()->back();
    }

    public function takeAway(){
      Session::put('order_type', 'take_away');

      return redirect()->back();
    }

    public function unsetType(){
      Session::forget('order_type');

      return redirect()->back();
    }

    public function menu(){
       return view('menu');
    }

}

