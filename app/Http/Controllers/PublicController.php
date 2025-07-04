<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    //Homepage
    public function homepage()
   {
    return view('homepage');
   }



       
}

