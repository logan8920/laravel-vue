<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Paytm\PaytmPayment;
use App\Services\PhonePe\PhonePayment;
use App\Services\RazorPay\RazorPayPayment;
use App\Models\{Plan,UserTransaction};
use Exception;
use Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function initial_payment(Request $request)
    {
        $planId = $request->plan_id;
        $mode = $request->payment_mode;
        $user_id = $request->user()->id;
        try {
            $planDetails = Plan::where("id", base64_decode($planId))->first();
            if (empty($planDetails)) {
                throw new Exception("Plan Details Not Found!", 404);
            }
            $random = rand(111111, 9999999);
            $amount = $planDetails->price;
            $cust_id = "CUST_{$random}_$user_id";
            $order_id = "ORDER_ID_{$random}";

            $transaction = UserTransaction::create([
                "user_id" => $request->user()->id,
                "payment_mode" => $mode,
                "plan_id" => $planId,
                //"transaction_id" => "TRANSACTION_ID_".rand(11111,9999999),
                "order_id" => $order_id,
                "amount" => $amount,
                "status" => "0",
                "timestamp" => time(),
                //"response_received" => json_encode($response)
            ]);
            /* Payemnt Method Call here 
            $response = $mode == "paytm" ?
                PaytmPayment::initiate($amount, $cust_id, $order_id) :
                (
                    $mode == "phonepe" ?
                    PhonePePayment::initiate($amount, $cust_id, $order_id) :
                    (
                        $mode == "razorpay" ?
                        RazorPayPayment::initiate($amount, $cust_id, $order_id) :
                        throw new Exception("Payment Method Not Found", 404)
                    )
                );
             end of Payemnt Method here */

            $response = (object) [
                "responseCode"=> '0000'
            ];
            
            if($response->responseCode != "0000") {
                $transaction->update([
                    "transaction_id" => "TRANSACTION_ID_".rand(11111,9999999),
                    "timestamp" => time(),
                    "status" => "2",
                    "response_received" => json_encode($response)
                ]);
                throw new Exception("Payment Proccess Failed, Please Try again later!", 422);  
            }
            
            $transaction->update([
                "transaction_id" => "TRANSACTION_ID_".rand(11111,9999999),
                "timestamp" => time(),
                "status" => "1",
                "response_received" => json_encode($response)
            ]);

            return $this->sendSuccess("Payment Completed!!",200);

        } catch (Exception $e) {
            $this->sendError($e->getMessage(), $e->getCode());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
