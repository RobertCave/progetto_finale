<div>
    <div class="container my-5">
        <h2 class="mb-4">Il tuo Carrello</h2>

        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(count($cartItems) > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Prodotti nel carrello</h5>
                        </div>
                        <div class="card-body p-0">
                            @foreach($cartItems as $item)
                                <div class="row align-items-center p-3 border-bottom">
                                    <div class="col-md-2">
                                        <img src="{{ $item->book->cover_image ? asset('storage/' . $item->book->cover_image) : 'https://placehold.co/400' }}"
                                             alt="Copertina" class="img-fluid rounded" style="max-height: 80px;">
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="mb-1">{{ $item->book->title }}</h6>
                                        <p class="mb-0 text-muted">{{ $item->book->author }}</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="mb-0"><strong>€{{ number_format($item->book->price, 2, ',', '.') }}</strong></p>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group input-group-sm">
                                            <button class="btn btn-outline-secondary" type="button" 
                                                    wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})">-</button>
                                            <input type="number" class="form-control text-center" 
                                                   value="{{ $item->quantity }}" min="1"
                                                   wire:change="updateQuantity({{ $item->id }}, $event.target.value)">
                                            <button class="btn btn-outline-secondary" type="button"
                                                    wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})">+</button>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <p class="mb-1"><strong>€{{ number_format($item->quantity * $item->book->price, 2, ',', '.') }}</strong></p>
                                        <button class="btn btn-sm btn-outline-danger" 
                                                wire:click="removeItem({{ $item->id }})">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Riepilogo Ordine</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Subtotale:</span>
                                <span>€{{ number_format($total, 2, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Spedizione:</span>
                                <span>Gratuita per merito di Aulab</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <strong>Totale:</strong>
                                <strong>€{{ number_format($total, 2, ',', '.') }}</strong>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <a href="{{ route('checkout') }}" class="btn btn-success btn-lg">
                                    <i class="bi bi-credit-card"></i> Procedi al Checkout
                                </a>
                                <button class="btn btn-outline-secondary" wire:click="clearCart">
                                    <i class="bi bi-cart-x"></i> Svuota Carrello
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-cart3 fa-3x text-muted mb-3"></i>
                <h4>Il tuo carrello è vuoto</h4>
                <p class="text-muted">Aggiungi alcuni libri al tuo carrello per iniziare lo shopping!</p>
                <a href="{{ route('homepage') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Continua lo Shopping
                </a>
            </div>
        @endif
    </div>
</div>
