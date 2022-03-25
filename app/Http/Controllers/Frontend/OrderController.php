<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Razorpay\Api\Api;
use Carbon\Carbon;
use Exception;
use Session;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ViewOrderPage()
    {
        $user_id = session("USER_ID");
        $user = User::where("id", $user_id)->get();
        $category = Category::get();
        $products = Product::get();
        $city = City::get();

        return view("frontend.order.order_view", compact("user", "category", "products", "city"));
    }

    public function OrderCheckout(Request $request)
    {
        $user_id = $request->user_id;
        $customer_name = $request->customer_name;
        $email = $request->email;
        $phone_no = $request->phone_no;
        $pin_no = $request->pin_no;
        $city = $request->city;
        $state = $request->state;
        $country = $request->country;
        $product_id = $request->product_id;
        $full_address = $request->full_address;
        $quantity = $request->qty;
        $product = Product::where("id", $product_id)->get();
        $price = $product[0]->product_price * $quantity;
        $message = $request->msg;
        $payment_type = $request->payment_type;

        if ($payment_type == "cash") {
            Order::insert([
                "user_id" => $user_id,
                "customer_name" => $customer_name,
                "order_id"=>uniqid(),
                "email" => $email,
                "phone_no" => $phone_no,
                "pin_no" => $pin_no,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "product_id" => $product_id,
                "price" => $price,
                "quantity" => $quantity,
                "full_address" => $full_address,
                "message" => $message,
                "payment_type" => $payment_type,
                "payment_status" => "unpaid",
                "order_status" => "undelivered",
                "created_at"=>Carbon::now(),
            ]);

            $data = array(
                "product_qty" => $product[0]->product_qty - $quantity
            );

            Product::where("id", $product_id)->update($data);

            $request->session()->flash("msg", "Your order is successful.");
            return redirect()->route("view.order");
        }
        if($payment_type == "online"){
            $data = array(
                "user_id" => $user_id,
                "customer_name" => $customer_name,
                "email" => $email,
                "phone_no" => $phone_no,
                "pin_no" => $pin_no,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "product_id" => $product_id,
                "price" => $price,
                "quantity" => $quantity,
                "full_address" => $full_address,
                "message" => $message,
                "payment_type" => $payment_type,
            );

            return view("frontend.order.rozaropay", compact("data"));
        }
        if ($payment_type == "credit") {
            Order::insert([
                "user_id" => $user_id,
                "customer_name" => $customer_name,
                "order_id"=>uniqid(),
                "email" => $email,
                "phone_no" => $phone_no,
                "pin_no" => $pin_no,
                "city" => $city,
                "state" => $state,
                "country" => $country,
                "product_id" => $product_id,
                "price" => $price,
                "quantity" => $quantity,
                "full_address" => $full_address,
                "message" => $message,
                "payment_type" => $payment_type,
                "payment_status" => "unpaid",
                "order_status" => "undelivered",
                "created_at"=>Carbon::now(),
            ]);

            $data = array(
                "product_qty" => $product[0]->product_qty - $quantity
            );

            Product::where("id", $product_id)->update($data);

            $request->session()->flash("msg", "Your order is successful.");
            return redirect()->route("view.order");
        }
    }

    public function PayOnline(Request $request){
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                $request->session()->flash("msg", $e->getMessage());
                return redirect()->back();
            }
        }
          
        Order::insert([
            "user_id" => session("USER_ID"),
            "customer_name" => $request->customer_name,
            "order_id"=>uniqid(),
            "email" => $request->email,
            "phone_no" => $request->phone_no,
            "pin_no" => $request->pin_no,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "product_id" => $request->product_id,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "full_address" => $request->full_address,
            "message" => $request->message,
            "payment_type" => "online",
            "payment_status" => "paid",
            "payment_id"=> $payment["id"],
            "order_status" => "undelivered",
            "created_at"=>Carbon::now(),
        ]);
        
        $request->session()->flash("msg", "Payment Successfull");
        return redirect()->route("view.order");
    }

    public function CancelOrder($id){
        $data = array(
            "order_status"=> "cancel"
        );

        Order::where("id",$id)->update($data);

        return redirect()->route("my.account");
    }


}
