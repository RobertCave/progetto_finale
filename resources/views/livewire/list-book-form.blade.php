<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container my-5">
        <h2 class="mb-4"> Elenco libri disponibili</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Form di modifica libro --}}
        @if($editingBookId)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Modifica Libro</h5>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateBook">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editTitle" class="form-label">Titolo</label>
                                    <input type="text" class="form-control @error('editTitle') is-invalid @enderror" 
                                           id="editTitle" wire:model="editTitle">
                                    @error('editTitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="editAuthor" class="form-label">Autore</label>
                                    <input type="text" class="form-control @error('editAuthor') is-invalid @enderror" 
                                           id="editAuthor" wire:model="editAuthor">
                                    @error('editAuthor')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Descrizione</label>
                            <textarea class="form-control @error('editDescription') is-invalid @enderror" 
                                      id="editDescription" rows="3" wire:model="editDescription"></textarea>
                            @error('editDescription')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="editCategoryId" class="form-label">Categoria</label>
                                    <select class="form-select @error('editCategoryId') is-invalid @enderror" 
                                            id="editCategoryId" wire:model="editCategoryId">
                                        <option value="">Seleziona categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('editCategoryId')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="editIsbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control @error('editIsbn') is-invalid @enderror" 
                                           id="editIsbn" wire:model="editIsbn">
                                    @error('editIsbn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="editPrice" class="form-label">Prezzo (€)</label>
                                    <input type="number" step="0.01" class="form-control @error('editPrice') is-invalid @enderror" 
                                           id="editPrice" wire:model="editPrice">
                                    @error('editPrice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editCoverImage" class="form-label">Nuova Copertina (opzionale)</label>
                            <input type="file" class="form-control 
                            @error('editCoverImage') is-invalid @enderror" 
                                   id="editCoverImage" wire:model="editCoverImage" accept="image/*">
                            @error('editCoverImage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Lascia vuoto per mantenere la copertina attuale</div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-floppy"></i> Salva Modifiche
                            </button>
                            <button type="button" class="btn btn-secondary" wire:click="cancelEdit">
                                <i class="bi bi-x-square"></i> Annulla
                            </button>
                        </div>
                    </form>
                </div>
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
                                <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : 'https://placehold.co/400' }}"
                                    alt="Copertina libro" style="width: 50px; height: auto; object-fit: cover;">
                            </td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>€{{ number_format($book->price, 2, ',', '.') }}</td>
                            <td class="text-end">
                                <button wire:click="editBook({{ $book->id }})" class="btn btn-warning btn-sm me-2">
                                    Modifica
                                </button>
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
