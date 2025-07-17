<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4">
                    <i class="bi bi-credit-card"></i> Checkout
                </h2>

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('process.order') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        {{-- Informazioni utente --}}
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-person"></i> Informazioni di spedizione
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Nome:</strong></label>
                                        <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Email:</strong></label>
                                        <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"><strong>Indirizzo:</strong></label>
                                        <p class="form-control-plaintext">
                                            {{ Auth::user()->address }} <br>
                                            {{ Auth::user()->postalcode }}
                                            {{ Auth::user()->city }}
                                                
                                        </p>
                                    </div>
                                    @if(!Auth::user()->address)
                                        <div class="alert alert-warning">
                                            <small>
                                                <i class="bi bi-exclamation-triangle"></i>
                                                Indirizzo non presente nel profilo. Aggiorna il tuo profilo per completare l'ordine.
                                            </small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Riepilogo ordine --}}
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bi bi-cart-check"></i> Riepilogo ordine
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @foreach($cartItems as $item)
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ $item->book->title }}</h6>
                                                <small class="text-muted">{{ $item->book->author }}</small>
                                                <div class="mt-1">
                                                    <small class="text-muted">
                                                        Quantità: {{ $item->quantity }} x €{{ number_format($item->book->price, 2, ',', '.') }}
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <strong>€{{ number_format($item->quantity * $item->book->price, 2, ',', '.') }}</strong>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotale:</span>
                                        <span>€{{ number_format($total, 2, ',', '.') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>Spedizione:</span>
                                        <span class="text-success">Gratuita</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <strong>Totale:</strong>
                                        <strong class="text-success">€{{ number_format($total, 2, ',', '.') }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pulsanti azione --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p class="mb-3">
                                        <i class="bi bi-info-circle"></i>
                                        Controlla attentamente i dettagli del tuo ordine prima di procedere.
                                    </p>
                                    
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a href="{{ route('cart') }}" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-left"></i> Torna al carrello
                                        </a>
                                        
                                        @if(Auth::user()->address)
                                            <button type="submit" class="btn btn-success btn-lg">
                                                <i class="bi bi-check-circle"></i> Procedi all'ordine
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-secondary btn-lg" disabled>
                                                <i class="bi bi-exclamation-triangle"></i> Completa il profilo per ordinare
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
