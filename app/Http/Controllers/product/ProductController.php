<?php

namespace App\Http\Controllers\product;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  public function index()
  {
    //get all product from the database
    $products = Product::get();

    //return the products alongside with the view
    return view('product.product', [
      'products' => $products,
    ]);
  }

  public function addToCart(Product $product, Request $request)
  {

    //check if the cart with that products id exits for thee user making the request
    if ($product->hasCart(Auth::user())) {
      //if it exist return back
      return back();
    }

    //if the cart doesn't exist create a new instance of cart
    $cart = $product->cart()->create([
      'user_id' => $request->user()->id,
    ]);

    if ($cart) {
      return back();
    }
  }

  public function removeFromCart(Product $product, Request $request)
  {
    //get the cart using the product id and the user id, and asign to a new variable
    $cart = $product->cart()->where('user_id', $request->user()->id);

    //delete the cart from carts table
    $success = $cart->delete();
    if ($success) {
      return back();
    }
  }
}
