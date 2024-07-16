<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;


class PurchaseController extends Controller
{
        public function index()
    {
        $purchases = Purchase::with('supplier', 'product')->paginate(5);
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchases.create', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
        ]);

        Purchase::create($request->all());
         // Retrieve product and calculate total price
        $product = Product::findOrFail($request->product_id);
        // Update product stock
        $new_stock = $product->stock + $request->quantity;
        $product->update(['stock' => $new_stock, 'supplier_id' => $request->supplier_id,]);


        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
    }
}
