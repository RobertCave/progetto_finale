<x-layout>
    <div class="container py-5">
        {{-- Header della pagina --}}
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">
                    <i class="bi bi-shop"></i> Shop
                    @if(isset($category))
                        - {{ $category->name }}
                    @endif
                </h1>
                <p class="lead text-muted">
                    @if(isset($category))
                        Scopri tutti i libri della categoria "{{ $category->name }}"
                    @else
                        Scopri tutti i nostri libri disponibili
                    @endif
                </p>
                @if(isset($category))
                    <div class="mt-3">
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Visualizza tutti i prodotti
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Griglia dei prodotti --}}
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            @forelse ($books as $book)
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <a href="{{ route('book.details', $book->id) }}">
                            {{-- Immagine del libro --}}
                            <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://via.placeholder.com/400x500?text=Copertina' }}"
                                class="card-img-top" alt="Copertina di {{ $book->title }}"
                                style="height: 400px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">
                                <strong>Autore:</strong> {{ $book->author }}
                            </p>
                            <p class="card-text">
                                <i>{{ Str::limit($book->description, 120) }}</i>
                            </p>
                            <div class="mt-auto">
                                @if ($book->category)
                                    <p class="mb-2"><small>Genere: {{ $book->category->name }}</small></p>
                                @endif
                                <p class="mb-2"><strong>Prezzo: €{{ number_format($book->price, 2, ',', '.') }}</strong></p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('book.details', $book->id) }}" class="btn btn-sm btn-success">Dettagli</a>
                                    @livewire('add-to-cart', ['bookId' => $book->id], key($book->id))
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    {{-- Messaggio quando non ci sono libri disponibili --}}
                    <div class="text-center py-5">
                        <i class="bi bi-book display-1 text-muted"></i>
                        <h3 class="mt-3">Nessun libro disponibile</h3>
                        <p class="text-muted">Al momento non ci sono libri nel nostro catalogo in questa categoria.</p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Paginazione --}}
        @if($books->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Paginazione prodotti">
                        {{ $books->links() }}
                    </nav>
                </div>
            </div>
        @endif

        {{-- Informazioni sulla paginazione --}}
        @if($books->count() > 0)
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <small class="text-muted">
                        Visualizzando {{ $books->firstItem() }} - {{ $books->lastItem() }} 
                        di {{ $books->total() }} prodotti
                    </small>
                </div>
            </div>
        @endif
    </div>
</x-layout>
