<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function ViewCity(){
        $citys = City::latest()->get();
    	return view('backend.city.city_view',compact('citys'));
    }

    public function CityStore(Request $request){
       /* $request->validate([
    		'city_name' => 'required',
    		'city_pincode' => 'required',
    		'city_name' => 'Input City Name',
    	]);*/

	City::insert([
		'city_name' => $request->city_name,
		'city_pincode' => $request->city_pincode,

    	]);

	    $notification = array(
			'message' => 'City Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }

    public function CityEdit($id){
        $city = City::findOrFail($id);
    	return view('backend.city.city_edit',compact('city'));
    }

    public function CityUpdate(Request $request){
        $city_id = $request->id;
    	

    /*City::findOrFail($city_id)->update([
        'city_name' => $request->city_name,
		'city_slug' => strtolower(str_replace(' ', '-',$request->city_name)),		 
    	]);*/

		$data = array(
			"city_name"=>$request->city_name,
			"city_pincode"=>$request->city_pincode	 

		);

		City::where("id",$city_id)->update($data);

	    $notification = array(
			'message' => 'City Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('view.city')->with($notification);
 
    }

    public function CityDelete($id){
        $city = City::findOrFail($id);

    	City::findOrFail($id)->delete();

    	 $notification = array(
			'message' => 'City Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route("view.city")->with($notification);
    }
}
