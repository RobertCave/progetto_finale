<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
    $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
    return view('dashboard.orders', compact('orders'));
  }

  // Modifica ordine
  public function editOrder($id)
  {
    $order = Order::with(['user', 'orderProducts.book'])->findOrFail($id);
    return view('dashboard.order-edit', compact('order'));
  }

  // Aggiornamento  ordine
  public function updateOrder(Request $request, $id)
  {
    $request->validate([
      'status' => 'required|string|in:in_elaborazione,spedito,completato,annullato',
      'total' => 'required|numeric|min:0'
    ]);

    $order = Order::findOrFail($id);
    $order->update([
      'status' => $request->status,
      'total' => $request->total
    ]);

    return redirect()->route('dashboard_orders')->with('success', 'Ordine aggiornato con successo!');
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
