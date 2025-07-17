<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h1 class="display-4 text-success mb-3">Ordine Completato!</h1>
                    <p class="lead text-muted">
                        Grazie per il tuo acquisto. Il tuo ordine è stato elaborato con successo.
                    </p>
                </div>

                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">
                            <i class="bi bi-receipt"></i> Dettagli Ordine #{{ $order->id }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Informazioni Cliente:</h6>
                                <p class="mb-1"><strong>Nome:</strong> {{ $order->user->name }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p class="mb-3"><strong>Indirizzo:</strong> {{ $order->user->address }} {{ $order->user->city }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6>Informazioni Ordine:</h6>
                                <p class="mb-1"><strong>Data:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                <p class="mb-1"><strong>Stato:</strong> 
                                    <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                                </p>
                                <p class="mb-3"><strong>Totale:</strong> 
                                    <span class="text-success fw-bold">€{{ number_format($order->total, 2, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="bi bi-box-seam"></i> Prodotti Ordinati
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($order->orderProducts as $item)
                            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $item->book->title }}</h6>
                                    <p class="mb-0 text-muted">{{ $item->book->author }}</p>
                                    <small class="text-muted">
                                        Quantità: {{ $item->quantity }} x €{{ number_format($item->price, 2, ',', '.') }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <strong>€{{ number_format($item->quantity * $item->price, 2, ',', '.') }}</strong>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="alert alert-info">
                    <h6><i class="bi bi-info-circle"></i> Cosa succede ora?</h6>
                    <ul class="mb-0">
                        <li>Riceverai una email di conferma all'indirizzo email : {{ $order->user->email }}</li>
                        <li>PAga con bonifico all'iban: IT000012312312381902381029381023  </li>
                        <li>Ti invieremo un aggiornamento quando l'ordine sarà spedito</li>
                        <li>La spedizione è gratuita grazie ad Aulab e avverrà solo se ottengo il certificato finale :-)</li>
                    </ul>
                    {{-- PEr semplificare, non ho implementato il pagamento online, ma con bonifico. --}}
                </div>

                <div class="text-center">
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="{{ route('homepage') }}" class="btn btn-primary">
                            <i class="bi bi-house"></i> Torna alla Homepage
                        </a>
                        <a href="{{ route('shop') }}" class="btn btn-outline-primary">
                            <i class="bi bi-shop"></i> Continua lo Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
