<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //Homepage
    public function homepage()
   {
     $latestBooks = Book::with('category')->latest()->take(6)->get();
        return view('homepage', compact('latestBooks'));
   }

   // Dettagli per ogni Book
   public function bookDetails($id)
   {
       $book = Book::with('category')->findOrFail($id);
       return view('book-details', compact('book'));
   }

   // Shop page - solo 9 per pagina
   // Mostra tutti i libri con paginazione che balls
   public function shop()
   {
       $books = Book::with('category')->paginate(9);
       return view('shop', compact('books'));
   }


    // Faq page
   public function faq()
   {
       return view('faq');
   }

 // Contact page
   public function contact()
   {
       return view('contact');
   }
}
