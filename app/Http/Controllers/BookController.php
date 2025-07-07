<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view ('dashboard.books.create');

    }


    public function list()
    {
        return view ('dashboard.books.list');

    }
}
