<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CategoryControler extends Controller
{
    public function ViewCategory(){
        $category = Category::latest()->get();
        return view("backend.category.category_view", compact("category"));
    }

    public function AddCategory(Request $request){
       $request->validate([
           "category_name"=>"required"
       ]);

       
       Category::insert([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
    ]);

    $notification = array(
        'message' => 'Category Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    public function EditCategory($id){
        $category = Category::where("id", $id)->get();

        return view('backend.category.category_edit', compact("category"));
    }

    public function UpdateCategory(Request $request, $id){
        $request->validate([
            "category_name"=>"required"
        ]);

        $data = array(
            "category_name"=>$request->category_name,
            "category_slug"=> strtolower(str_replace(' ', '-', $request->category_name)),
        );

        Category::where("id",$id)->update($data);
   
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.category')->with($notification);

    }

    public function DeleteCategory($id){
        Category::where("id",$id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.category')->with($notification);


    }

}
