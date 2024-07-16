@extends('layouts.app')
@section('title', ' | Add Product')

@section('content')
    <div class="container">
        <h1>Add Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="min_stock">Minimum Stock</label>
                <input type="number" class="form-control" id="min_stock" name="min_stock" required>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fas fa-arrow-left mr-1"></i>Back to
                Products</a>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection
