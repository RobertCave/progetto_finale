<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DashboardUser extends Controller
{
  //
  //Dashboard
  public function dashboard()
  {
    return view('dashboard.index');
  }


  // Ordini
  public function dashboard_orders()
  {
    return view('dashboard.orders');
  }

// Prodotti - libri
  public function dashboard_products()
  {
    return view('dashboard.products');
  }

// Clienti
  public function dashboard_customers()
  {
    return view('dashboard.customers');
  }

}
