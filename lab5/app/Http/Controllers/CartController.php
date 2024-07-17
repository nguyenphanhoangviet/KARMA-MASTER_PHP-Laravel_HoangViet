<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session; // Import Session
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Request $request)
    {
        dd($request);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        // Giả sử bạn có mô hình Product
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "img" => $product->img
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function incrementQuantity(Request $request, $productId)
    {
        try {
            Log::info('Increment Quantity called for product: ' . $productId);

            $cart = Session::get('cart', []);
            
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
                Session::put('cart', $cart);
                Log::info('Quantity incremented for product: ' . $productId);
                return response()->json(['success' => true]);
            }

            Log::warning('Failed to increment quantity for product: ' . $productId);
            return response()->json(['success' => false]);
        } catch (\Exception $e) {
            Log::error('Error incrementing quantity for product: ' . $productId . ' - ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function decrementQuantity(Request $request, $productId)
    {
        try {
            Log::info('Decrement Quantity called for product: ' . $productId);

            $cart = Session::get('cart', []);
            
            if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
                Session::put('cart', $cart);
                Log::info('Quantity decremented for product: ' . $productId);
                return response()->json(['success' => true]);
            }

            Log::warning('Failed to decrement quantity for product: ' . $productId);
            return response()->json(['success' => false]);
        } catch (\Exception $e) {
            Log::error('Error decrementing quantity for product: ' . $productId . ' - ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }
    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
