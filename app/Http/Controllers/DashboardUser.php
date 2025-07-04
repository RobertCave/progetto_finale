<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    //
    //Dashboard
    public function dashboard()
   {
    return view('dashboard.index');
   }

   public function dashboard_orders()
   {
    return view('dashboard.orders');
   }


   public function dashboard_products()
   {
    return view('dashboard.products');
   }


     public function dashboard_customers()
   {
    return view('dashboard.customers');
   }

}
