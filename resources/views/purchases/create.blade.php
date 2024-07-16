@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Purchase</h1>
        <form action="{{ route('purchases.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="supplier_id">Supplier:</label>
                <select name="supplier_id" class="form-control" required>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_id">Product:</label>
                <select name="product_id" class="form-control" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="number" name="total_price" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Purchase</button>
        </form>
    </div>
@endsection
