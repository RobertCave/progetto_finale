<x-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                {{-- Immagine del libro --}}
                <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://placehold.co/400' }}"
                     class="img-fluid rounded shadow" alt="Copertina di {{ $book->title }}"
                     style="max-height: 600px; width: 100%; object-fit: cover;">
            </div>
            <div class="col-md-6">
                <div class="ps-md-4">
                    {{-- Titolo --}}
                    <h1 class="display-4 fw-bold mb-3">{{ $book->title }}</h1>
                    
                    {{-- Autore --}}
                    <p class="fs-5 text-muted mb-3">
                        <strong>Autore:</strong> {{ $book->author }}
                    </p>
                    
                    {{-- Categoria --}}
                    @if ($book->category)
                        <p class="mb-3">
                            <span class="badge bg-secondary fs-6">{{ $book->category->name }}</span>
                        </p>
                    @endif
                    
                    {{-- Prezzo --}}
                    <p class="fs-3 fw-bold text-success mb-4">
                        €{{ number_format($book->price, 2, ',', '.') }}
                    </p>
                    
                    {{-- Descrizione --}}
                    <div class="mb-4">
                        <h5>Descrizione:</h5>
                        <p class="text-muted">{{ $book->description }}</p>
                    </div>
                    
                    {{-- Pulsanti --}}
                    <div class="d-flex gap-3 mb-4">
                        @livewire('add-to-cart', ['bookId' => $book->id])
                        <a href="{{ route('homepage') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Torna alla homepage
                        </a>
                    </div>
                    
                    {{-- Informazioni aggiuntive che per questioni di semplicità non ho aggiunto --}}
                    <div class="border-top pt-4">
                        <h6 class="fw-bold">Informazioni prodotto:</h6>
                        <ul class="list-unstyled">
                            <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
                            <li><strong>Pagine:</strong>  Non specificate </li>
                            <li><strong>Anno di pubblicazione:</strong> Non specificato</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
