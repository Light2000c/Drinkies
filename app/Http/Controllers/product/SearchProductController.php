<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchProductController extends Controller
{
    public function index(){
        return view('product.search');
    }
}
