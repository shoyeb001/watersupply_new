<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function AdminLogin(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);


        $email  =   $request->post("email");
        $password = $request->post("password");

        $result = Admin::where("email", $email)->where("password", $password)->get();
        if (isset($result[0])) {
            if ($result[0]->super == 1) {
                $request->session()->put("ADMIN_ID", $result[0]->id);
                if ($request->input("remember") != NULL) {
                    setcookie('admin_email', $email, time() + 60 * 60 * 24 * 30, '/');
                    setcookie('admin_password', $password, time() + 60 * 60 * 24 * 30, '/');
                }
                return redirect(route("admin.dashboard"));
            }
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget("ADMIN_ID");
        return redirect(url("/"));
 
   }

   public function ChangePassword(){
       return view("admin.change_password");
   }

   public function UpdatePassword(Request $request){
       $id = session("ADMIN_ID");
       $admin = Admin::where("id",$id)->get();

       $old_password = $request->old_password;
       $new_password = $request->new_password;
       $confirm_password = $request->confirm_password;

       if ($admin[0]->password == $old_password) {
           if ($new_password == $confirm_password) {
               $data = array(
                   "password"=>$new_password,
               );

               Admin::where("id",$id)->update($data);

               $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success'
               );

               return redirect()->route("admin.change.password")->with($notification);
    

           }else {
            $notification = array(
                'message' => 'Password and Confirm Password does not match',
                'alert-type' => 'error'
               );

               return redirect()->route("admin.change.password")->with($notification);
    
           }
       }else {
        $notification = array(
            'message' => 'Enter the old password carefully',
            'alert-type' => 'error'
           );

           return redirect()->route("admin.change.password")->with($notification);

       }
   }

   public function AdminLogout(Request $request){
    $request->session()->forget("ADMIN_ID");
    return redirect()->route("admin.login.view");
}

}
