<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Product;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        if (!$size) {
            return redirect()->route('single-product', ['id' => $productId])->with('error', 'Size is required');
        }

        $this->cartService->add($productId, $product->name, $quantity, $product->price, $product->img, $size);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $cart = $this->cartService->getCart();
        return view('user.karma-master.cart', compact('cart'));
    }

    public function remove(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $cartItemKey = $productId . '-' . $size;

        $this->cartService->remove($cartItemKey);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $cartItemKey = $productId . '-' . $size;
        $quantity = $request->input('quantity');

        $this->cartService->update($cartItemKey, $quantity);

        return redirect()->route('cart.index');
    }
}
