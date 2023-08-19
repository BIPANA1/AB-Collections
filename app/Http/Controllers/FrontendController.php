<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function product()
    {
        $products = product::all();
        return view('admin.product', compact('products'));
    }
    public function addproduct()
    {
        return view('admin.addproduct');
    }
}
