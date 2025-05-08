<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['products', 'customer', 'seller'])->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $clients = User::whereHas('role', function($q) {
            $q->where('name', 'cliente');
        })->get();
        
        $sellers = User::whereHas('role', function($q) {
            $q->where('name', 'vendedor');
        })->get();
        
        $products = Product::all();
        
        return view('invoices.create', compact('clients', 'sellers', 'products'));
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'seller_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);
    
        $invoice = Invoice::create([
            'user_id' => $validated['user_id'],
            'seller_id' => $validated['seller_id'],
            'total' => 0
        ]);
    
        $total = 0;
        foreach ($validated['products'] as $item) {
            $product = Product::find($item['id']);
            $invoice->products()->attach($product->id, [
                'quantity' => $item['quantity']
            ]);
            $total += $product->price * $item['quantity'];
        }
        
        $invoice->update(['total' => $total]);
    
        return redirect()->route('invoices.show', $invoice->id)
            ->with('success', 'Factura creada correctamente');

    }
}