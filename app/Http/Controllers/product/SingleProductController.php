<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
   public function index(Product $product){
      
    $related_products = Product::where('product_category', $product->product_category)->take(4)->get();
    return view('product.singleproduct', [
      'product' => $product,
      'related' => $related_products,
    ]);
   }
}
