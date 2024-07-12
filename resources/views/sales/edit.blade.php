@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Sale</h1>
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select name="customer_id" class="form-control" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $sale->customer_id ? 'selected' : '' }}>
                            {{ $customer->first_name }} {{ $customer->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_id">Product:</label>
                <select name="product_id" class="form-control" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $product->id == $sale->product_id ? 'selected' : '' }}>
                            {{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="number" name="total_price" class="form-control" step="0.01"
                    value="{{ $sale->total_price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Sale</button>
        </form>
    </div>
@endsection
