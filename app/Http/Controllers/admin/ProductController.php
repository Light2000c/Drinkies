<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(10);
        return view('admin.product', [
           'products' => $products,
        ]);
    }


    public function deleteProduct(Product $product){

    //    $products = Product::where('id', $product->id)->first();
    $product = Product::where('id', $product->id)->first();

      if(!$product->delete()){
         return back()->with('error', 'Something went wrong, please try again later.');
      }

      return back()->with('success', 'product was successfully deleted.');

    }
}
