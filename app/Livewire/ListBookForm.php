<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Category;

class ListBookForm extends Component
{
    use WithFileUploads;

    public $books;
    public $categories;
    
    // Proprietà per la modifica
    public $editingBookId = null;
    public $editTitle, $editAuthor, $editDescription, $editCategoryId, $editIsbn, $editPrice, $editCoverImage;
    
    protected $rules = [
        'editTitle' => 'required|min:3',
        'editAuthor' => 'required',
        'editDescription' => 'required',
        'editCategoryId' => 'required|exists:categories,id',
        'editIsbn' => 'required|numeric|min:10',
        'editPrice' => 'required|numeric|min:0',
        'editCoverImage' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->loadBooks();
        $this->categories = Category::all();
    }

    public function loadBooks()
    { 
        $this->books = Book::latest()->get();
    }

    public function editBook($id)
    {
        $book = Book::find($id);
        if ($book) {
            $this->editingBookId = $id;
            $this->editTitle = $book->title;
            $this->editAuthor = $book->author;
            $this->editDescription = $book->description;
            $this->editCategoryId = $book->category_id;
            $this->editIsbn = $book->isbn;
            $this->editPrice = $book->price;
            $this->editCoverImage = null; // Reset file input
        }
    }

    public function updateBook()
    {
        $this->validate();

        $book = Book::find($this->editingBookId);
        if ($book) {
            $updateData = [
                'title' => $this->editTitle,
                'author' => $this->editAuthor,
                'description' => $this->editDescription,
                'category_id' => $this->editCategoryId,
                'isbn' => $this->editIsbn,
                'price' => $this->editPrice,
            ];

            // Se è stata caricata una nuova immagine
            if ($this->editCoverImage) {
                // Elimina la vecchia immagine
                if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                    Storage::disk('public')->delete($book->cover_image);
                }
                
                // Salva la nuova immagine
                $updateData['cover_image'] = $this->editCoverImage->store('covers', 'public');
            }

            $book->update($updateData);
            
            session()->flash('message', 'Libro aggiornato con successo!');
            $this->cancelEdit();
            $this->loadBooks();
        }
    }

    public function cancelEdit()
    {
        $this->editingBookId = null;
        $this->editTitle = '';
        $this->editAuthor = '';
        $this->editDescription = '';
        $this->editCategoryId = '';
        $this->editIsbn = '';
        $this->editPrice = '';
        $this->editCoverImage = null;
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
