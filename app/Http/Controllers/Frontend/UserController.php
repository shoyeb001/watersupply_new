<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\signup;
use App\Models\Order;

class UserController extends Controller
{
    public function ViewSignUp()
    {
        return view("frontend.auth.signup");
    }

    public function UserSignUp(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
            "phone_no" => "required",
            "username" => "required",
            "pin_no" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "full_address_1" => "required",
            "confirm_password" => "required"
        ]);

        $email = $request->input("email");
        $password = $request->input("password");
        $confirm_password = $request->input("confirm_password");
        $phone_no = $request->input("phone_no");

        $data = User::where("email", $email)->get()->count();
        $data2 = User::where("phone", $phone_no)->get()->count();

        if ($data > 0 || $data2 > 0) {
            $request->session()->flash("msg", "user already exists");
            return redirect()->route("user.signup.view");
        } else {
            if ($password != $confirm_password) {
                $request->session()->flash("msg", "Password does not match");
                return redirect()->route("user.signup.view");
            } else {
                $user = array(
                    "name" => $request->username,
                    "email" => $email,
                    "phone_no" => $phone_no,
                    "password" => $password,
                    "pin_no" => $request->pin_no,
                    "city" => $request->city,
                    "state" => $request->state,
                    "country" => $request->country,
                    "full_address_1" => $request->full_address_1,
                    "full_address_2" => $request->full_address_2,
                    'updated_at' => date('y-m-d h:i:s'),
                    'created_at' => date('y-m-d h:i:s')
                );
                User::insert($user);
                Mail::to($request->email)->send(new signup($user));
                $request->session()->flash("msg", "Account created successfully. Please verify your email.");
                return redirect()->route("user.signup.view");
            }
        }
    }

    public function VerifyUser(Request $request, $email)
    {
        $data = User::where("email", $email)->get()->count();

        if ($data == 0) {
            $request->session()->flash("msg", "Email not found");
        } else {
            $array = array(
                "email_verified_at" => date('y-m-d h:i:s')
            );
            User::where("email", $email)->update($array);
            $request->session()->flash("msg", "Email verified successfully. Now login");
        }

        return redirect()->route("user.signup.view");
    }

    public function ViewLogin()
    {
        return view("frontend.auth.login");
    }

    //login start

    public function UserLogin(Request $request)
    {
        $request->validate([
            "phone_no" => "required",
            "password" => "required"
        ]);

        $phone_no = $request->input("phone_no");
        $password = $request->input("password");

        $data = User::where("phone_no", $phone_no)->where("password", $password)->get();

        if (!isset($data[0])) {
            $request->session()->flash("login_msg", "please enter correct login information");
            return redirect(route("user.login.view"));
        } else {
            $request->session()->put("USER_ID", $data[0]->id);
            if ($request->input("remember") != NULL) {
                setcookie('user_phone', $phone_no, time() + 60 * 60 * 24 * 30);
                setcookie('user_password', $password, time() + 60 * 60 * 24 * 30);
            }
            return redirect(url("/"));
        }
    }

    //login ends

    public function MyAccountPage(Request $request){
        $user_id = session("USER_ID");
        $user = User::where("id",$user_id)->get();
        $orders = Order::where("user_id", $user_id)->get();
        $credits = Order::where("user_id", $user_id)->where("payment_type","credit")->where("payment_status","unpaid")->get();
        return view("frontend.user.my_account", compact("user", "orders", "credits"));

    }

    public function PersonalinfoUpdate(Request $request){
        $user_id = session("USER_ID");

        $password = $request->password;

        $user = User::where("id",$user_id)->get();
        if ($user[0]->password == $password) {
            $data = array(
                "email"=> $request->email,
                "name"=>$request->username,
                "phone_no"=>$request->phone_no
            );

            User::where("id",$user_id)->update($data);

            return redirect()->route("my.account");
        }else{
           $request->session()->flash("msg","* Please enter valid password");
           return redirect()->route("my.account");
        }
    }

    public function PasswordUpdate(Request $request){
        $user_id = session("USER_ID");
        $user = User::where("id",$user_id)->get();
        $old_password = $request->old_password;
        $new_password = $request->new_password;

        if ($user[0]->password == $old_password) {
            $data = array(
                "password"=>$new_password
            );

            User::where("id",$user_id)->update($data);
            return redirect()->route("my.account");
        }else{
            $request->session()->flash("msg","* old password is wrong");
            return redirect()->route("my.account");

        }
    }

    public function Logout(Request $request){
        $request->session()->forget("USER_ID");
        return redirect()->route("home");
    }



}
