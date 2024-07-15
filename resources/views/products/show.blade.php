@extends('layouts.app')
@section('title', ' | Show Product')

@section('content')
    <div class="container">
        <h1>Product Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $product->stock }}</td>
            </tr>
        </table>
        <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fas fa-arrow-left mr-1"></i>Back to Products</a>
        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning"><i class="fas fa-edit mr-1"></i>Edit</a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Delete</button>
        </form>
    </div>
@endsection
