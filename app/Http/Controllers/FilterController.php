<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function showHighestPrice()
    {
        $products = Product::orderBy('price', 'desc')->get();
        return view('welcome', compact('products'));
    }
}
