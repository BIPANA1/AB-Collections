<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Order;
use App\Models\orderDetails;
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

    public function order(){
        $orderDetails = orderDetails::latest()->get();
        $orders = Order::latest()->get();
        return view('admin.order',compact('orders','orderDetails'));
    }

    public function deleteOrder($id){
        $item = orderDetails::find($id);
        $item->delete();
        return back();
        
    }
}
