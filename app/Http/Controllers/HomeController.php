<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     * 
     * 
     */


    public function index()
    {
        if (auth()->user()->role == 1) {
            return view('admin.dashboard');
        } else {
            $users = User::all();
            $products = product::all();
            return view('user.home', compact('users','products'));
        }
    }
}
