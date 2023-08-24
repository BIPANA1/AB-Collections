<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cart()
    {
        
        $user = auth()->user();
        $carts = Cart::where('user_id',$user->id)->get();
        return view('user.cart', ['carts' => $carts]);
    
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
    public function store($id)
    {
        $product = product::find($id);
        if($product->stock > 0){
            $existingCartItem = Cart::where('user_id',auth()->user()->id)->where('product_id', $id)->first();
        
            if ($existingCartItem) {
                // If the item already exists in the cart, increase the quantity by 1
                $existingCartItem->quantity += 1;
                $existingCartItem->save();
            } else {
                $cart = new Cart();
                $cart->user_id = auth()->user()->id;
                $cart->product_id = $id;
                $cart->quantity = 1;
                $cart->save();
            }
            $product->stock--;
            $product->save();
            return back()->with('sucess','Product added to cart sucessfully.');
            }else{
                return back()->with('error','Product out of stock.');
            }
            
        }
        
        
        
        

    

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $item = Cart::find($id);
        $item->delete();
        return back();
    }


    public function updateQuantity(Request $request)
    {

        // Validate the request data, you can add more validation rules as needed
        $request->validate([
            'cart_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the cart item by its ID and update the quantity
        $Item = Cart::findOrFail($request->cart_id);
        $Item->quantity = $request->quantity;
        $Item->save();

    return back();
    }
}
