<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show cart page
    public function index()
    {
        return view('cart');
    }

    // Checkout page
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('user_id', Auth::id())->first();
        
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Il carrello è vuoto');
        }

        $cartItems = Cart_product::where('cart_id', $cart->id)
            ->with('book')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Il carrello è vuoto');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->book->price;
        });

        return view('checkout', compact('cartItems', 'total'));
    }
}
