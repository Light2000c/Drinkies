<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class ViewProductController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.viewProduct', [
            'product' => $product,
        ]);
    }

    public function editProduct(Request $request, Product $product)
    {

          //checks if request is to update image
        if ($request->has('image')) {
            $message = "Product image has been successfully updated.";
            //validates and incoming request
            $this->validate($request, [
                'product_image' => 'required|mimes:png,jpg,jfif,jpeg,png',
            ]);

            //create a new name for the image and move to another folder
            $new_image = time() . '-' . $request->product_name . '.' . $request->file('product_image')->guessExtension();

            if (!$request->file('product_image')->move('products', $new_image)) {
                return back()->with('error', "Something went wrong, Please try again later.");
            }

            //update the image name on the database
           $product = DB::table('products')->where('id', $product->id)->update([
                'product_image' => $new_image,
            ]);

            if ($product) {
                return back()->with('success', $message);
            }
        }


        //checks if request is to update  properties
        if ($request->has('properties')) {
            $message = "Product properties has been successfully updated.";
            //validates and incoming request
            $this->validate($request, [
                'product_name' => 'required',
                'product_price' => 'required',
                'product_category' => 'required',
                'product_description' => 'required',
            ]);

            //save changes made on product
            $product = DB::table('products')->where('id', $product->id)->update([
                'product_name' => $request->product_name,
                'product_price' => $request->product_price,
                'product_category' => $request->product_category,
                'product_description' => $request->product_description,
            ]);

            if($product){
                return back()->with('success', $message);
            }
        }
    }
}
