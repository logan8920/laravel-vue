<?php 
/**
 * Payment is use to initial the payemnt process, handle the responses
 * recived form paytm api.
 * 
 * @author Jayanta Bhuna <Bhuniajayant@gmail.com>
 * @version 1.0.0
 */

 namespace App\Services\Paytm;

 use App\Services\Paytm\PaytmChecksum;
 use Exception;
 
class PaytmPayment
{
    private $mid;
    private $m_key;

    public function __construct(){
        $this->mid = env("PAYTM_MID");
        $this->m_key = env("PAYTM_MKEY");
    }

    /**
     * Start Paytm transaction
     * @param $amount,$customer_id,$order_id
     * @return object
     * @throws \Exception
     */
    public static function initiate($amount, $customer_id, $order_id)
    {
        $paytmParams = [];
        $mid = Self::$mid;
        $m_key = Self::$m_key;
        $paytmParams["body"] = [
            "requestType" => "Payment",
            "mid" => $mid,
            "websiteName" => "WEBSTAGING",
            "orderId" => $order_id,
            "callbackUrl" => "http://locahost/ppg/response.php",
            "txnAmount" => [
                "value" => $amount,
                "currency" => "INR",
            ],
            "userInfo" => [
                "custId" => "CUST_{$customer_id}",
                "mobile" => request()->user()->phone,
                "email" => request()->user()->email,
                "firstName" => request()->user()->name,
            ],
        ];

        $checksum = PaytmChecksum::generateSignature(
            json_encode($paytmParams["body"], 
            JSON_UNESCAPED_SLASHES), 
            key: $m_key
        );
        $paytmParams["head"] = [
            "version" => "v1",
            "channelId" => "WEB",
            "signature" => $checksum,
            "requestTimestamp" => time()
        ];

        $post_data = json_encode(
            $paytmParams, 
            JSON_UNESCAPED_SLASHES
        );
        /* for Staging */
        $url = "https://securegw-stage.paytm.in/theia/api/v1/initiateTransaction?mid={$mid}&orderId={$order_id}";

        /* for Production */
        //$url = "https://securegw.paytm.in/theia/api/v1/initiateTransaction?mid={$mid}&orderId={$orderId}";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        } else {
            return json_decode($response);
        }

    }
}