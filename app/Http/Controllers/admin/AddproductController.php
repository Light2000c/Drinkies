<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class AddproductController extends Controller
{
    public function index(){
        return view('admin.addproduct');
    }

    public function addProduct(Request $request){
      

        //Validates an incoming request
        $this->validate($request, [
            'product_name' => 'required|unique:products,product_name',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,webp,png,jfif',
            'product_description' => 'required',
        ]);

        //create a new name for the image and move to a new folder
        $new_image = time().'-'.$request->product_name.'.'.$request->file('product_image')->guessExtension();

       if(!$request->file('product_image')->move('products', $new_image)){
           return back()->with('error', 'Something went wrong, please try again later.');
       }


       //create a new instance of product
      $product =  Product::create([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_category' => $request->product_category,
        'product_image' => $new_image,
        'product_description' => $request->product_description,
       ]);

       if(!$product){
        return back()->with('error', 'Something went wrong, please try again later.');
       }

        return  back()->with('success', 'New product has been successfully added.');
    }
}
