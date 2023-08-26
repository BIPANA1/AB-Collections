<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\orderDetails;
use App\Models\product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->address = $request->address;
        $order->contact = $request->contact;
        $order->message = $request->message;


        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($cart as $c) {
            $product = product::find($c->product_id);
            $total = $total + ($product->price * $c->quantity);
        }
        // dd($total);
        $order->total_price = $total;
        $order->status = "Ordered";
        $order->user_id = $request->user()->id;
        $order->save();


        foreach ($cart as $c) {
            $product = product::find($c->product_id);
            $orderDetails = new orderDetails();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $c->product_id;
            $orderDetails->qty = $c->quantity;
            $orderDetails->user_id = $request->user()->id;
            $orderDetails->product_price = $order->total_price;
            $orderDetails->save();


            $c->delete();
        }

        return redirect('/order-details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function orderDetails()
    {
        
        $user = auth()->user();
        $orderDetails = orderDetails::where('user_id', $user->id)->get();
        return view('user.orderDetails',compact('orderDetails'));
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function checkout()
    {
        return view('user.checkout');
    }
    
    public function placeOrder()
    {
        return back();
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $data = orderDetails::where('id', $id)->first();
        $data->delete();
        return redirect()->back();
    }
}
