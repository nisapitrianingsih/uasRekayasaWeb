@extends('layouts.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container">
        <h1>Add Sale</h1>
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="customer_id">Customer:</label>
                <select name="customer_id" class="form-control" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="product_id">Product:</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="" data-stock="0" data-price="0">Select a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" data-stock="{{ $product->stock }}"
                            data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="0" min="1"
                    required>
            </div>

            <div class="form-group">
                <label for="total_price">Total Price:</label>
                <input type="number" name="total_price" id="total_price" class="form-control" placeholder="0" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Add Sale</button>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Function to update max attribute of quantity input based on selected product's stock
                function updateQuantityMax() {
                    var selectedStock = $('#product_id').find('option:selected').data('stock');
                    $('#quantity').attr('max', selectedStock); // Set max attribute based on selected product's stock

                    // Reset quantity input if current value exceeds new max stock
                    var currentVal = parseInt($('#quantity').val());
                    if (currentVal > selectedStock) {
                        $('#quantity').val(selectedStock);
                    }

                    // Update total price based on quantity and product price
                    updateTotalPrice();
                }

                // Function to update total price based on quantity and product price
                function updateTotalPrice() {
                    var price = $('#product_id').find('option:selected').data('price');
                    var quantity = parseInt($('#quantity').val());
                    if (isNaN(quantity) || quantity < 1) {
                        quantity = 1;
                    }
                    var totalPrice = price * quantity;
                    $('#total_price').val(totalPrice.toFixed(2)); // Set total price input value
                }

                // Initial setup based on default selected product
                updateQuantityMax();

                // Handle change in product dropdown
                $('#product_id').change(function() {
                    updateQuantityMax();
                });

                // Handle input change to enforce max value dynamically
                $('#quantity').on('input', function() {
                    var currentVal = parseInt($(this).val());
                    var maxStock = parseInt($('#quantity').attr('max'));
                    if (currentVal > maxStock) {
                        $(this).val(maxStock); // Set to max stock if exceeding
                    } else if (currentVal < 1 || isNaN(currentVal)) {
                        $(this).val(1); // Set to min value if less than 1 or NaN
                    }

                    // Update total price based on quantity and product price
                    updateTotalPrice();
                });
            });
        </script>
    @endsection
