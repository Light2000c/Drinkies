<?php

namespace App\Http\Controllers\product;

use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){

        //get carts of the active user from database
        $carts = Cart::get();

        //return carts alongside with the view
        return view('product.cart', [
            'carts' => $carts,
        ]);
    }
}
