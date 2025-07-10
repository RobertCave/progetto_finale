<div>
    <div class="container my-5">
        <h2 class="mb-4">Elenco Clienti Registrati</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Città</th>
                        <th scope="col">Paese</th>
                        <th scope="col">CAP</th>
                        <th scope="col" class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->postalcode }}</td>
                            <td class="text-end">
                                <button wire:click.prevent="deleteUser({{ $user->id }})"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo utente? L\'azione è irreversibile.')"
                                    class="btn btn-danger btn-sm" {{ $user->id == auth()->id() ? 'disabled' : '' }}>
                                    Elimina
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Nessun cliente registrato.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>