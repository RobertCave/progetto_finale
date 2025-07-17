<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Shop by category
    public function shopByCategory($categoryId)
    {
        $books = Book::with('category')->where('category_id', $categoryId)->paginate(9);
        $category = Category::findOrFail($categoryId);
        return view('shop', compact('books', 'category'));
    }
}
