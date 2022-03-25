<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Offlineorder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class BillController extends Controller
{
    public function AddCustomer(){
        return view("admin2.bill.add_customer");
    }

    public function StoreCustomer(Request $request){
       $order_id =  Offlineorder::insertGetId([
           "customer_name"=>$request->customer_name
       ]);

       return redirect("bill.add.product",$order_id);
    }

    public function ProductAdd($id){
        $products = Product::latest()->get();
        return view("admin2.bill.add_product", compact("id","products"));
    }

    public function OrderStore(Request $request){
        $order_id = $request->order_id;
        $product_id = $request->product_id;

        $data = array(
            "product_id" => $product_id,
            "price"=> $request->price,
            "quantity" => $request->quantity,
            "order_id"=>uniqid(),
            "total_price" => $request->price * $request->quantity,
            "payment_type"=>"offline",
            "payment_status"=>"paid",
            "order_status"=>"undelivered",
            "created_at"=>Carbon::now()
        );

        Offlineorder::where("id",$order_id)->update($data);

        return redirect()->route("offline.invoice",$order_id);
    }

    public function OfflineInvoice($id){
       $order  = Offlineorder::where("id",$id)->get();
      
       return view("admin2.bill.view_invoice", compact("order"));
    }

    public function OfflineInvoiceView($id){
        $order  = Offlineorder::where("id",$id)->get();

        $pdf = PDF::loadView('admin2.invoice.offline', compact("order"));
        return $pdf->stream();
      
    }

    public function OnlineInvoice($id){
        $order = Order::where("id",$id)->get();
        return view("admin2.bill.view_invoice_online", compact("order"));
    }

    public function onlineInvoiceView($id){
        $order  = Order::where("id",$id)->get();
        $pdf = PDF::loadView('admin2.invoice.online', compact("order"));
        return $pdf->stream();
    }
}
