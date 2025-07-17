<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cartItems = [];
    public $total = 0;

    public function mount()
    {
        // maledetto Livewire
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            
            if ($cart) {
                $this->cartItems = Cart_product::where('cart_id', $cart->id)
                     ->with('book')
                    ->get();
                
                $this->calculateTotal();
            }
        }
    }

    public function calculateTotal()
    {
        $this->total = $this->cartItems->sum(function ($item) {
            return $item->quantity * $item->book->price;
        });
    }

    public function updateQuantity($cartProductId, $quantity)
    {
        if ($quantity <= 0) {
            $this->removeItem($cartProductId);
            return;
        }

        $cartProduct = Cart_product::find($cartProductId);
        if ($cartProduct) {
            $cartProduct->update(['quantity' => $quantity]);
            $this->loadCartItems();
            session()->flash('message', 'Quantità aggiornata!');
        }
    }

//frustrazione qui

    public function removeItem($cartProductId)
    {
        // $cartProduct = Cart_product::find($cartId);
        $cartProduct = Cart_product::find($cartProductId);

        if ($cartProduct) {
            $cartProduct->delete();
            $this->loadCartItems();
            session()->flash('message', 'Prodotto rimosso dal carrello!');
        }
    }

    public function clearCart()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                Cart_product::where('cart_id', $cart->id)->delete();
                $this->loadCartItems();
                session()->flash('message', 'Carrello svuotato!');
            }
        }
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
