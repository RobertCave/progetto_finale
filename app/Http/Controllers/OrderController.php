<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_product;
use App\Models\Order;
use App\Models\order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Process order
    public function processOrder()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Controlliamo se l'utente ha un carrello
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();
        
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Il carrello è vuoto');
        }

        // Controlliamo se  ha prodotti
        $cartItems = Cart_product::where('cart_id', $cart->id)
            ->with('book')
            ->get();

        // e spendiamo un po' di soldi 
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Il carrello è vuoto');
        }

        $total = $cartItems->sum(function ($item) {
            // Calcoliamo il totale
            return $item->quantity * $item->book->price;
        });

        // Create order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'ricevuto'
        ]);

        // Create order products
        foreach ($cartItems as $item) {
            order_product::create([
                'order_id' => $order->id,
                'book_id' => $item->book->id,
                'quantity' => $item->quantity,
                'price' => $item->book->price
            ]);
        }

        // Puliamo il carrello 
        Cart_product::where('cart_id', $cart->id)->delete();

        return redirect()->route('order.success', $order->id);
    }

    // Order success page
    public function orderSuccess($orderId)
    {
        $order = Order::with(['user', 'orderProducts.book'])->findOrFail($orderId);
        
        // controlliamo se l'ordine appartiene all'utente autenticato altrimenti abortiamo :-|
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('order-success', compact('order'));
    }

    // User orders page
    public function userOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $orders = Order::where('user_id', Auth::id())
            ->with(['orderProducts.book'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user-orders', compact('orders'));
    }
}
