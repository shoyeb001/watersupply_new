<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;

class Admin2Controller extends Controller
{
    public function Admin2View()
    {
        return view("admin2.auth.login");
    }

    public function Admin2Login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);


        $email  =   $request->post("email");
        $password = $request->post("password");

        $result = Admin::where("email", $email)->where("password", $password)->get();
        if (isset($result[0])) {
            if ($result[0]->invoice == 1) {
                $request->session()->put("ADMIN_ID2", $result[0]->id);
                if ($request->input("remember") != NULL) {
                    setcookie('admin2_email', $email, time() + 60 * 60 * 24 * 30, '/');
                    setcookie('admin2_password', $password, time() + 60 * 60 * 24 * 30, '/');
                }
                return redirect(route("admin2.index"));
            }
        } else {
            return redirect()->back();
        }
    }

    public function Admin2Dashboard(){
        $paidorders = Order::where("payment_status","paid")->latest()->take(20)->get();
        $unpaidorders = Order::where("payment_status","unpaid")->latest()->take(20)->get();
        return view("admin2.index", compact("paidorders","unpaidorders"));
    }

    public function Admin2Logout(Request $request){
        $request->session()->forget("ADMIN_ID2");
        return redirect()->route("admin2.index");
    }

    //credits management

    public function ViewCredits(){
       $users = Order::where("payment_type","credit")->get("user_id")->unique();
        return view("admin2.credit.view", compact("users"));
    }

    public function PayCredit($id){
       $data = array(
           "payment_status"=>"paid",
       );

       Order::where("user_id", $id)->where("payment_type","credit")->where("payment_status","unpaid")->update($data);

       return redirect()->route("view.credits");
    }
}
