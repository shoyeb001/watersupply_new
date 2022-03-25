<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function DeliveryView(){
        $deliveries = Order::where("order_status","undelivered")->get();
        return view("admin2.delivery.view", compact("deliveries"));
    }

    public function DeliverySuccess($id){
      $order = Order::where("id",$id)->get();
      $data = array(
          "order_status" => "delivered",
          "payment_status"=>"paid"
      );
      Order::where("id",$id)->update($data);

      return redirect()->route("view.delivery");
    }
}
