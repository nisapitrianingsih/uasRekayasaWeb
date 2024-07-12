@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $customer->id }}</td>
            </tr>
            <tr>
                <th>First Name</th>
                <td>{{ $customer->first_name }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $customer->last_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $customer->phone }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $customer->address }}</td>
            </tr>
        </table>
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to Customers</a>
        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
