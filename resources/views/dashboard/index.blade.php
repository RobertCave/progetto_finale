<x-layout-clean>


    <x-header-dash />

    <div class="container-fluid">
        <div class="row">

            <x-dashboard-menu />

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Dashboard per l'amministratore</h2>
                </div>

                <!-- Grandi pulsanti di navigazione -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <a href="{{ route('dashboard_orders') }}" class="btn btn-primary btn-lg w-100 h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" style="min-height: 150px;">
                            <i class="bi bi-table fs-1 mb-3"></i>
                            <h4 class="mb-0">Ordini</h4>
                            <small class="text-light">Gestisci tutti gli ordini</small>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('dashboard_customers') }}" class="btn btn-success btn-lg w-100 h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" style="min-height: 150px;">
                            <i class="bi bi-people fs-1 mb-3"></i>
                            <h4 class="mb-0">Utenti</h4>
                            <small class="text-light">Gestisci i clienti</small>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('dashboard.books.list') }}" class="btn btn-warning btn-lg w-100 h-100 d-flex flex-column align-items-center justify-content-center text-decoration-none" style="min-height: 150px;">
                            <i class="bi bi-journal-richtext fs-1 mb-3"></i>
                            <h4 class="mb-0">Prodotti</h4>
                            <small class="text-dark">Gestisci i prodotti</small>
                        </a>
                    </div>
                </div>

                <!-- collegamenti rapidi -->
                <div class="row g-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Benvenuto nella Dashboard</h5>
                                <p class="card-text">Utilizza i pulsanti sopra per navigare rapidamente alle sezioni principali della dashboard amministrativa.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

</x-layout-clean>
