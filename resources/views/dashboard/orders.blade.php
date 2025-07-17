<x-layout-clean>

    <x-header-dash />

    <div class="container-fluid">
        <div class="row">

            <x-dashboard-menu />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestione Ordini</h1>
                </div>

                @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Ordine</th>
                                    <th>Cliente</th>
                                    <th>Email Cliente</th>
                                    <th>Totale</th>
                                    <th>Status</th>
                                    <th>Data Ordine</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr style="cursor: pointer;" onclick="window.location='{{ route('dashboard.order.edit', $order->id) }}'">
                                        <td><strong>#{{ $order->id }}</strong></td>
                                        <td>{{ $order->user ? $order->user->name : 'Cliente eliminato' }}</td>
                                        <td>{{ $order->user ? $order->user->email : 'N/A' }}</td>
                                        <td><strong>€{{ number_format($order->total, 2, ',', '.') }}</strong></td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{-- Mostra lo stato dell'ordine in modo leggibile --}}
                                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                            </span>
                                        </td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.order.edit', $order->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i> Modifica
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        <h4>Nessun ordine trovato</h4>
                        <p>Non ci sono ancora ordini nel sistema.</p>
                    </div>
                @endif

            </main>
        </div>
    </div>

</x-layout-clean>
