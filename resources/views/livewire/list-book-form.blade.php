<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container my-5">
        <h2 class="mb-4"> Elenco libri disponibili</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Copertina</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col" class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>
                                <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://via.placeholder.com/50x75?text=N/A' }}"
                                    alt="Copertina libro" style="width: 50px; height: auto; object-fit: cover;">
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>€{{ number_format($book->price, 2, ',', '.') }}</td>
                            <td class="text-end">
                                <button
                                    onclick="confirm('Sei sicuro di voler eliminare questo libro?') || event.stopImmediatePropagation()"
                                    wire:click.prevent="deleteBook({{ $book->id }})" class="btn btn-danger btn-sm">
                                    Elimina
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Nessun libro presente.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
