<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{
    private $subscription_type = "calculated";
    private $terms = "Monthly";
    private $name = "Monthly Repayment";
    private $merchant_id = "10295";
    private $api_key = "CCSds08MmmyN";
    public function addSubscription($purpose, $subscription_id, $payment_sequence){
        $hash_key = md5($this->api_key."|".$this->merchant_id."|".$subscription_id."|".$this->subscription_type."|".$this->name."|"."|".$this->terms."|".$purpose);

        $repayment_periods = [];
        foreach($payment_sequence as $p){
            $item['total'] = $p["max_payment_seq"];
            $item['terms'] = 'Month';
            $item['amount'] = $p['ammount'];

            $repayment_periods[] = $item;
        }

        $data_subscription = array(
            'merchant_id' => $this->merchant_id,
            'subscription_type' => $this->subscription_type,
            'terms' => $this->terms,
            'subscription_id' => $subscription_id,
            'name' => $this->name,
            'purpose' => $purpose,
            'repayment_periods' => $repayment_periods,
            'hash' => $hash_key,
        );

        $data_encode = json_encode($data_subscription);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-type:multipart/form-data'));
        curl_setopt($ch, CURLOPT_URL,"https://www.demo.betterpay.me/merchant/api/recurring/v1/add_subscription");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_encode);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if(! $server_output){
            die("Connection Failure");
        }
        curl_close ($ch);

        return [
            'http_response_code' => $httpcode,
            'data' => $server_output
        ];
    }

    public function addSubscriber(){
        //
    }

    public function subscriberCallback(Request $request){
        // 2. decode $request
        // 3. olah data hasil decode $request
        // 4. redirect
    }
}
