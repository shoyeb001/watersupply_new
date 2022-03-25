<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Image;
use Svg\Tag\Rect;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.add', compact('categories', 'brands'));
    }

    public function StoreProduct(Request $request){
        $request->validate([
           "category_id"=>"required",
           "product_title"=>"required | unique:products",
           "product_qty"=>"required",
           "product_price"=>"required",
           "product_image"=>"required",
           "short_descp"=>"required",
           "long_descp"=>"required"
        ]);

        $image = $request->file('product_image');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('uploads/products/' . $name_gen);
        $save_url = 'uploads/products/' . $name_gen;

        Product::insert([
            "product_brand"=>$request->brand_id,
            "product_category"=>$request->category_id,
            "product_title"=>$request->product_title,
            "product_qty"=>$request->product_qty,
            "product_price"=>$request->product_price,
            "product_image"=>$save_url,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            "short_description"=>$request->short_descp,
            "long_description"=>$request->long_descp,

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('add.product')->with($notification);
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view("backend.product.manage", compact("products"));
    }

    
    public function EditProduct($id){
        $product = Product::where("id",$id)->get();
        $brands = Brand::get();
        $categories = Category::get();
        return view("backend.product.edit", compact("product","brands","categories"));
    }

    public function UpdateProduct(Request $request){
         $request->validate([
             "id"=>"required",
             "product_category"=>"required",
             "product_name"=>"required",
             "product_qty"=>"required",
             "product_price"=>"required",
             "short_descp"=>"required",
             "long_descp"=>"required"
         ]);

         $id = $request->id;

         $data = array(
             "product_category"=>$request->product_category,
             "product_brand"=>$request->product_brand,
             "product_title"=>$request->product_name,
             "product_qty"=>$request->product_qty,
             "product_price"=>$request->product_price,
             "short_description"=>$request->short_descp,
             "long_description"=>$request->long_descp
         );

         Product::where("id",$id)->update($data);

         $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage.product')->with($notification);
    }

    public function ImageUpdate(Request $request){
        $id = $request->id;

        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_image');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('uploads/products/' . $name_gen);
        $save_url = 'uploads/products/' . $name_gen;

        Product::findOrFail($id)->update([
            'product_image' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id){
        $product = Product::where("id",$id)->get();
        $img = $product[0]->product_image;
        unlink($img);
        Product::where("id",$id)->delete();

        
        $notification = array(
            'message' => 'Product Deeleted Successfully',
            'alert-type' => 'danger'
        );

        return redirect()->back()->with($notification);

    }
}
