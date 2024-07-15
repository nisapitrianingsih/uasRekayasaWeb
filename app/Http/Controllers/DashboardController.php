<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale; // Asumsikan model Sale ada di App\Models
use App\Models\Product;
class DashboardController extends Controller
{
 public function index()
    {
        // Mengambil data penjualan
        $sales = Sale::selectRaw('DATE(created_at) as date, SUM(total_price) as total_sales')
                     ->groupBy('date')
                     ->get();

        // Mengambil data stok produk
        $products = Product::all();
        $productsMin = Product::whereColumn('stock', '<=', 'min_stock')
                            ->orderBy('stock', 'asc')
                            ->take(10)
                            ->get();

        return view('dashboard', compact('sales', 'products', 'productsMin'));
    }
}
