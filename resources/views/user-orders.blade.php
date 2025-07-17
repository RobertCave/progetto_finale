<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="mb-4">
                    <i class="bi bi-bag-check"></i> I miei ordini
                </h2>

                @if($orders->count() > 0)
                    @foreach($orders as $order)
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">
                                        <i class="bi bi-receipt"></i> Ordine #{{ $order->id }}
                                    </h5>

                                </div>
                                <div class="text-end">
                                    <span class="badge bg-secondary fs-6">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="card-body">
                                @if($order->orderProducts->count() > 0)
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h6 class="mb-3">
                                                <i class="bi bi-list-ul"></i> Prodotti ordinati:
                                            </h6>
                                            
                                            @foreach($order->orderProducts as $orderProduct)
                                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">{{ $orderProduct->book->title }}</h6>
                                                        <small class="text-muted">{{ $orderProduct->book->author }}</small>
                                                        <div class="mt-1">
                                                            <small class="text-muted">
                                                                Quantità: {{ $orderProduct->quantity }} x €{{ number_format($orderProduct->price, 2, ',', '.') }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <strong>€{{ number_format($orderProduct->quantity * $orderProduct->price, 2, ',', '.') }}</strong>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        <i class="bi bi-calculator"></i> Riepilogo
                                                    </h6>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span>Prodotti:</span>
                                                        <span>{{ $order->orderProducts->count() }}</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span>Articoli totali:</span>
                                                        <span>{{ $order->orderProducts->sum('quantity') }}</span>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <strong>Totale pagato:</strong>
                                                        <strong class="text-success">€{{ number_format($order->total, 2, ',', '.') }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <i class="bi bi-exclamation-triangle"></i>
                                        Nessun prodotto trovato per questo ordine.
                                    </div>
                                @endif
                            </div>
                            
                            <div class="card-footer text-muted">
                                <div class="row align-items-center">
                                                                        <small class="text-muted">
                                        Effettuato il {{ $order->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Paginazione --}}
                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-bag-x display-1 text-muted mb-3"></i>
                            <h4 class="text-muted mb-3">Nessun ordine trovato</h4>
                            <p class="text-muted mb-4">
                                Non hai ancora effettuato nessun ordine. Inizia a fare shopping per vedere i tuoi ordini qui.
                            </p>
                            <a href="{{ route('shop') }}" class="btn btn-primary">
                                <i class="bi bi-shop"></i> Vai al negozio
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
