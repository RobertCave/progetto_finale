<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Cart_product;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $bookId;
    public $quantity = 1;

    public function mount($bookId)
    {
        $this->bookId = $bookId;
    }

    public function addToCart()
    {
        // Verifica se l'utente è autenticato
        if (!Auth::check()) {
            session()->flash('error', 'Devi effettuare il login per aggiungere prodotti al carrello.');
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Trova o crea il carrello per l'utente
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        // Verifica se il libro esiste già nel carrello
        $existingCartProduct = Cart_product::where('cart_id', $cart->id)
                                          ->where('book_id', $this->bookId)
                                          ->first();
        
        if ($existingCartProduct) {
            // Se esiste già, incrementa la quantità
            $existingCartProduct->increment('quantity', $this->quantity);
            session()->flash('message', 'Quantità aggiornata nel carrello!');
        } else {
            // Altrimenti crea un nuovo record
            Cart_product::create([
                'cart_id' => $cart->id,
                'book_id' => $this->bookId,
                'quantity' => $this->quantity
            ]);
            session()->flash('message', 'Libro aggiunto al carrello!');
        }

        // Emetti un evento per aggiornare il contatore del carrello se presente
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
