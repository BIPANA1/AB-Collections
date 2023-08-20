<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function product()
    {
        $products = product::all();
        $categories = category::all();
        return view('admin.product', compact('products', 'categories'));
    }
    public function addproduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }
    public function category()
    {
        $categories = category::all();
        return view('admin.category', compact('categories'));
    }
    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function createProduct(){
        $products = product::all();
        return view('user.product',compact('products'));
    }
}
