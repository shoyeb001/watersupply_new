<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function ProductDetails($slug){
        $product = Product::where("product_slug",$slug)->get();
        return view("frontend.product.product_details", compact("product"));
    }

    //product page

    public function ShowProductPage(){
        
    }


}
