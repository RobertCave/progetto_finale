<?php

namespace App\Livewire;

 
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;
use App\Models\Category;

class CreateBookForm extends Component
{

 
    use WithFileUploads;

    public $title, $author, $description, $category_id, $isbn, $price, $cover_image;
    public $categories;

    protected $rules = [
        'title' => 'required|min:3',
        'author' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'isbn' => 'required|numeric|min:10',
        'price' => 'required|numeric|min:0',
        // 'cover_image' => 'required|image|max:10248', // Limite di 1MB
        'cover_image' => 'required|image|max:2048',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate();

        $path = $this->cover_image->store('covers', 'public');

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'isbn' => $this->isbn,
            'price' => $this->price,
            'cover_image' => $path,
        ]);

        session()->flash('message', 'Libro creato con successo!');
        
        $this->reset();           // svuota tutti i campi
        $this->categories = Category::all();  // ricarica le categorie
    }



    public function render()
    {
        return view('livewire.create-book-form');
    }
}
