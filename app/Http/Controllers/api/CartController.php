<?php

namespace App\Http\Controllers\api;

use App\Cart;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function cartTotal($id){
        $user = User::find($id);

        $carts_quantity = Cart::where('user_id', $user->id)->sum('quantity');

        return response([
            'status' => 'success',
            'quantity' => $carts_quantity,
        ],200);
    }

    public function addToCart(Request $request){
       

        $request->validate([
            'productID' => 'required',
            'userID' => 'required',
        ]);

        $product = Product::find($request->productID);
        $user = User::find($request->userID);

        if ($product->hasCart($user)) {
            return response([
                'status' => 'Ok',
                'message' => 'Product already exists in your cart',
            ],200); 
          }

       $success = $product->cart()->create([
        'user_id' => $request->userID,
        ]);

        if(!$success){
            return response([
                'status' => 'failed',
                'message' => 'Product was not successfully added to cart',
            ],200); 
        }

        return response([
            'status' => 'success',
            'message' => 'Product successfully added to cart',
        ],200);
    }
}
