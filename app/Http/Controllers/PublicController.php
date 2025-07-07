<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //Homepage
    public function homepage()
   {
     $latestBooks = Book::with('category')->latest()->take(6)->get();
        return view('homepage', compact('latestBooks'));
   }



       
}

