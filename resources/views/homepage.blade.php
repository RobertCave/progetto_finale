<x-layout>

    <div class="bg-dark text-secondary px-4 py-3 text-center">
        <div class="py-3">
            <h1 class="display-2 fw-bold text-white"><i class="bi bi-journal-text"> </i> </h1>
            <h1 class="display-5 fw-bold text-white">The book shop</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">Un esempio di e-commerce creato per l'ultimo esercizio dell'Hackademy di Aulab.
                    Scopri il negozio Approfitta della grande svendita!
                </p>
            </div>
        </div>
    </div>

    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="right">
                    <h4>Ultimi arrivi:</h4>
                </div>
                   <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mt-3">
                    @forelse ($latestBooks as $book)
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <a href="{{ route('book.details', $book->id) }}">
                                    {{-- Se l'immagine di copertina esiste, la mostra, altrimenti un placeholder --}}
                                    <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://placehold.co/400' }}"
                                        class="card-img-top" alt="Copertina di {{ $book->title }}"
                                        style="height: 400px; object-fit: cover;">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">
                                        <strong>Autore:</strong> {{ $book->author }}
                                    </p>
                                    <p class="card-text">
                                        {{-- Limitiamo la descrizione a 120 caratteri per mantenere il layout pulito. --}}
                                         
                                        <i>{{ Str::limit($book->description, 120) }}</i>
                                    </p>
                                    <div class="mt-auto">
                                        @if ($book->category)
                                            <p class="mb-2"><small>Genere: {{ $book->category->name }}</small></p>
                                        @endif
                                        <p class="mb-2"><strong>Prezzo: €{{ number_format($book->price, 2, ',', '.') }}</strong></p>
                                        <div class="d-flex gap-2">
                                            <div><a href="{{ route('book.details', $book->id) }}" class="btn btn-sm btn-success">Dettagli</a></div>
                                            {{-- Pulsanti per aggiungere al carrello e visualizzare i dettagli --}}
                                            <div>@livewire('add-to-cart', ['bookId' => $book->id], key($book->id))</div>
                                            

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">Nessun libro disponibile al momento.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>


</x-layout>
