<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Paytm\PaytmPayment;
use App\Services\PhonePe\PhonePayment;
use App\Services\RazorPay\RazorPayPayment;
use App\Models\{Plan,UserTranscation,UserPlan};
use Exception;
use Response;
use DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function initial_payment(Request $request)
    {
        $planId = base64_decode($request->plan_id);
        $mode = $request->payment_mode;
        $user_id = $request->user()->id;
        try {

            DB::beginTransaction();
            $planDetails = Plan::where("id", $planId)->first();
            if (empty($planDetails)) {
                throw new Exception("Plan Details Not Found!", 404);
            }
            $random = rand(111111, 9999999);
            $amount = $planDetails->price;
            $cust_id = "CUST_{$random}_$user_id";
            $order_id = "ORDER_ID_{$random}";

            $transaction = UserTranscation::create([
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

            $check_any_active_plan = $request->user()->plans()->where("plan_type",1)->count();
            $plan_type = 1;
            if($check_any_active_plan) {
                $plan_type = 0;
            }

            $days = $this->days_in[$planDetails->type];

            $planDetails = $request->user()->plans()->create([
                "plan_id"=>$planId,
                "plan_type"=>$plan_type,
                "valid_form"=>date("Y-m-d"),
                "valid_to" => (new \DateTime())->modify("+$days days")->format("Y-m-d"),
            ]);
            DB::commit();
            return $this->sendSuccess("Payment Completed!!",200,$planDetails->toArray());

        } catch (Exception $e) {
            DB::rollBack();
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
