<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $items = Cart::where(['user_id'=> $id])->get();
        // $products = $items->products;

        $user = User::find($id);
        return view('cart.index', ['items' => $items], ['id' => $user->id]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function addToCart(Request $request, $productId, $id)
    {

        $product = Product::where('id', $productId)->first();
        // Check if the product is already in the cart for the current user

        $cartItem = Cart::where('user_id', $id)
            ->where('product_id', $productId)
            ->first();
        if ($cartItem) {

            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->input('quantity'),
                'total_price' => $cartItem->total_price + $product->price * $request->input('quantity')
            ]);
        } else {

            Cart::create([
                'user_id' => $id,
                'product_id' => $productId,
                'quantity' => $request->input('quantity'),
                'total_price' => ($product->price * $request->input('quantity'))
            ]);
        }

        // Redirect back to the product page or cart page
        return redirect()->route('user.profile', ['id' => $id]);
    }
}