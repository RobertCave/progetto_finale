<x-layout>
    <div class="container my-5">
        <h1 class="mb-4">Contattaci</h1>
        <p class="lead">Hai domande o suggerimenti? Siamo qui per aiutarti!</p>

        <form action="#" >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>
    </div>
</x-layout>