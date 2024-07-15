<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
          $sales = Sale::with('customer', 'product')->get();
    return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
      // Validasi request
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => [
            'required',
            'integer',
            'min:1',
            // Validasi custom untuk memeriksa stok tersedia
            function ($attribute, $value, $fail) use ($request) {
                $product = Product::findOrFail($request->product_id);
                if ($value > $product->stock) {
                    $fail("The $attribute must not be greater than available stock.");
                }
            },
        ],
        'total_price' => 'required|numeric',
    ]);

    // Buat penjualan baru
    $sale = Sale::create($request->all());

    // Kurangi jumlah stock produk yang terkait
    $product = Product::findOrFail($request->product_id);
    $product->stock -= $request->quantity;
    $product->save();

    // Redirect ke halaman penjualan dengan pesan sukses
    return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'customers', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}

