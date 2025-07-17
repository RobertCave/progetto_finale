<x-layout-clean>

    <x-header-dash />

    <div class="container-fluid">
        <div class="row">

            <x-dashboard-menu />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Modifica Ordine #{{ $order->id }}</h1>
                    <a href="{{ route('dashboard_orders') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Torna a elenco Ordini
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <!-- Informazioni Cliente -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Informazioni Cliente</h5>
                            </div>
                            <div class="card-body">
                                @if($order->user)
                                    <p><strong>Nome:</strong> {{ $order->user->name }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                    <p><strong>Indirizzo:</strong> {{ $order->user->address }} - {{ $order->user->city }}</p>
                                     
                                @else
                                    <p class="text-muted">Cliente eliminato dal sistema</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Informazioni Ordine -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Dettagli Ordine</h5>
                            </div>
                            <div class="card-body">
                                <p><strong>ID Ordine:</strong> #{{ $order->id }}</p>
                                <p><strong>Data Ordine:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Ultima Modifica:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Prodotti nell'Ordine -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Prodotti Ordinati</h5>
                    </div>
                    <div class="card-body">
                        @if($order->orderProducts->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Prodotto</th>
                                            <th>Quantità</th>
                                            <th>Prezzo Unitario</th>
                                            <th>Subtotale</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->orderProducts as $orderProduct)
                                            <tr>
                                                <td>
                                                    @if($orderProduct->book)
                                                        <strong>{{ $orderProduct->book->title }}</strong><br>
                                                        <small class="text-muted">{{ $orderProduct->book->author }}</small>
                                                    @else
                                                        <span class="text-muted">Prodotto eliminato</span>
                                                    @endif
                                                </td>
                                                <td>{{ $orderProduct->quantity }}</td>
                                                <td>€{{ number_format($orderProduct->price, 2, ',', '.') }}</td>
                                                <td><strong>€{{ number_format($orderProduct->price * $orderProduct->quantity, 2, ',', '.') }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Nessun prodotto trovato per questo ordine.</p>
                        @endif
                    </div>
                </div>

                <!-- Form di Modifica -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Modifica Ordine</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status Ordine</label>
                                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                            <option value="in_elaborazione" {{ $order->status == 'in_elaborazione' ? 'selected' : '' }}>In Elaborazione</option>
                                            <option value="spedito" {{ $order->status == 'spedito' ? 'selected' : '' }}>Spedito</option>
                                            <option value="completato" {{ $order->status == 'completato' ? 'selected' : '' }}>Completato</option>
                                            <option value="annullato" {{ $order->status == 'annullato' ? 'selected' : '' }}>Annullato</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="total" class="form-label">Totale Ordine (€)</label>
                                        <input type="number" step="0.01" min="0" class="form-control" 
                                               id="total" name="total" value="{{ $order->total }}" readonly>
                                        @error('total')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('dashboard_orders') }}" class="btn btn-secondary">Annulla</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg"></i> Salva Modifiche
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>

</x-layout-clean>
