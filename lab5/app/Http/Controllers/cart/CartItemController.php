<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartItemController extends Controller
{
    // protected $cartService;

    // public function __construct(CartService $cartService)
    // {
    //     $this->cartService = $cartService;
    // }

    // public function updateCart(Request $request)
    // {
    //     $cartItemKey = $request->input('cart_item_key');
    //     $quantity = $request->input('quantity');

    //     $this->cartService->update($cartItemKey, $quantity);

    //     return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    // }

    // public function removeFromCart(Request $request)
    // {
    //     $cartItemKey = $request->input('cart_item_key');

    //     $this->cartService->remove($cartItemKey);

    //     return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully!');
    // }
}
