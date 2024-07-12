@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sale Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $sale->id }}</td>
            </tr>
            <tr>
                <th>Customer</th>
                <td>{{ $sale->customer->first_name }} {{ $sale->customer->last_name }}</td>
            </tr>
            <tr>
                <th>Product</th>
                <td>{{ $sale->product->name }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $sale->quantity }}</td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td>{{ $sale->total_price }}</td>
            </tr>
        </table>
        <a href="{{ route('sales.index') }}" class="btn btn-primary">Back to Sales</a>
        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
