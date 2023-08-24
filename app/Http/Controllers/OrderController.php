<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
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
            $product = new product();
            $product->order_id = $order->id;
            $product->product_id = $c->product_id;
            $product->qty = $c->quantity;
            $product->user_id = $request->user()->id;
            $product->product_price = $order->total_price;
            $product->save();


            $c->delete();
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
