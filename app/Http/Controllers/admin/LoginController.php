<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

       if(!Auth::attempt($request->only('email','password', true))){
          return back()->with('msg','Something went wrong, please confirm if login details are correct then try again.');
       }

       return redirect()->route('admin_dashboard');

    }
}
