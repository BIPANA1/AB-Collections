<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $products = product::where('category_id', 'like', '%'.$request->search.'%')->orwhere('brand', 'like', '%'.$request->search.'%')->orwhere('price', 'like', '%'.$request->search.'%')->get();
        return view('user.product',compact('products'));
    }
}
