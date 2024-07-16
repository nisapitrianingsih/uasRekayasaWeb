@extends('layouts.app')
@section('title', ' | Edit Product')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}"
                    required>
            </div>
            <div class="form-group">
                <label for="min_stock">Minimum Stock:</label>
                <input type="number" name="min_stock" class="form-control" value="{{ $product->min_stock }}" required>
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier:</label>
                <select name="supplier_id" class="form-control" required>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-info"><i class="fas fa-arrow-left mr-1"></i>Back to
                Products</a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sync-alt"></i>
                Update Product
            </button>
        </form>
    </div>

@endsection
