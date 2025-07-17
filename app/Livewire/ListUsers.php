<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    // Usa un tema di paginazione che funziona bene con Bootstrap
    protected $paginationTheme = 'bootstrap';

    public function deleteUser($userId)
    {
        // Impedisce all'utente di eliminare se stesso
        // MAledizione
        if ($userId == auth()->id()) {
            session()->flash('error', 'Non puoi eliminare il tuo stesso account.');
            return;
        }
 
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'Utente eliminato con successo.');
        }
    }
    public function render()
    {
        // Recupera gli utenti paginandoli (10 per pagina)
        $users = User::latest()->paginate(10);
        return view('livewire.list-users', [
            'users' => $users,
        ]);
    }
}
