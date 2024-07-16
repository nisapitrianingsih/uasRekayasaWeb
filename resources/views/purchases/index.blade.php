@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Purchases</h1>
        <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add Purchase</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->id }}</td>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->product->name }}</td>
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->total_price }}</td>
                        <td>
                            <!-- Add edit and delete buttons here -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
