<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class ListBookForm extends Component
{
    public $books;

    public function mount()
    {
        $this->loadBooks();
    }

    public function loadBooks()
    {
        $this->books = Book::latest()->get();
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
        if ($book) {
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }

            $book->delete();
            session()->flash('message', "Libro eliminato con successo.");
            $this->loadBooks();
        }
    }

    public function render()
    {
        return view('livewire.list-book-form');
    }
}