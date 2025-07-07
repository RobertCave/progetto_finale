<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="py-5">
        <h1 class="h2"><i class="fs-4 bi-journal-richtext"></i> Inserisci libro nel sistema</h1>
        <p class="lead">Carica un libro in database e mettilo in vendita.</p>
        <hr>

        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif


        <div class="container">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">

                    @if ($cover_image)
                        <div class="mt-2">
                            <p>Anteprima:</p>
                            <img src="{{ $cover_image->temporaryUrl() }}" class="img-fluid rounded"
                                style="max-height: 200px;">
                        </div>
                    @endif
                </div>


                <div class="col-md-7 col-lg-8">
                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title">Titolo</label>
                            <input type="text" id="title" wire:model="title" class="form-control">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="author">Autore</label>
                            <input type="text" id="author" wire:model="author" class="form-control">
                            @error('author')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Descrizione</label>
                            <textarea id="description" wire:model="description" class="form-control"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id">Categoria</label>
                            <select wire:model="category_id" id="category_id" class="form-control">
                                <option value="">Seleziona categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" wire:model="isbn" class="form-control">
                            @error('isbn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price">Prezzo</label>
                            <input type="number" id="price" wire:model="price" step="0.01" class="form-control">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cover_image">Copertina</label>
                            <input type="file" id="cover_image" wire:model="cover_image" class="form-control">
                            @error('cover_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror



                        </div>

                        <button type="submit" class="btn btn-primary">Salva libro</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
