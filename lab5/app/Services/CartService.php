<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CartService
{
    public function add($productId, $name, $quantity, $price, $img, $size)
    {
        $cart = Session::get('cart', []);
        $cartItemKey = $productId . '-' . $size;

        if (isset($cart[$cartItemKey])) {
            $cart[$cartItemKey]['quantity'] += $quantity;
        } else {
            $cart[$cartItemKey] = [
                'product_id' => $productId,
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price,
                'img' => $img,
                'size' => $size,
            ];
        }

        Session::put('cart', $cart);
    }

    public function update($cartItemKey, $quantity)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$cartItemKey])) {
            $cart[$cartItemKey]['quantity'] = $quantity;
            Session::put('cart', $cart);
        }
    }

    public function remove($cartItemKey)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$cartItemKey])) {
            unset($cart[$cartItemKey]);
            Session::put('cart', $cart);
        }
    }

    public function getCart()
    {
        return Session::get('cart', []);
    }

    public function clear()
    {
        Session::forget('cart');
    }
}
