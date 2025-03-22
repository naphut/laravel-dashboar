@extends('layouts.app')

@section('title', 'Orders')
@section('header-title', 'Orders')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h1>Orders</h1>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <a href="{{ route('orders.store') }}">Add New Order</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer Type</th>
                <th>Payment Type</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->customerType->customer_type_description }}</td>
                    <td>{{ $order->paymentType->payment_type_description }}</td>
                    <td>{{ $order->order_quantity }}</td>
                    <td>{{ $order->order_date_time }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

    <!-- Edit Modal -->
    <div class="modal" id="edit-modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">×</span>
            <h3>Edit Order</h3>
            <form id="edit-order-form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-order-id" name="order_id">
                <div class="form-group">
                    <label for="edit-product">Product:</label>
                    <select id="edit-product" name="product" required>
                        <option value="1">Laptop</option>
                        <option value="2">Mouse</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-customer-type">Customer Type:</label>
                    <select id="edit-customer-type" name="customer_type" required>
                        <option value="1">Regular</option>
                        <option value="2">Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-payment-type">Payment Type:</label>
                    <select id="edit-payment-type" name="payment_type" required>
                        <option value="1">Credit Card</option>
                        <option value="2">Cash</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit-order-quantity">Quantity:</label>
                    <input type="number" id="edit-order-quantity" name="quantity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="edit-order-date-time">Date & Time:</label>
                    <input type="datetime-local" id="edit-order-date-time" name="date_time" required>
                </div>
                <div class="form-group">
                    <label for="edit-order-status">Status:</label>
                    <select id="edit-order-status" name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                </div>
                <div class="modal-buttons">
                    <button type="submit" class="btn btn-primary">Update Order</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal" id="add-modal">
        <div class="modal-content">
            <span class="close" onclick="closeAddModal()">×</span>
            <h3>Add New Order</h3>
            <form id="add-order-form" method="POST" action="{{ route('orders.store') }}">
                @csrf
                <div class="form-group">
                    <label for="add-product">Product:</label>
                    <select id="add-product" name="product" required>
                        <option value="1">Laptop</option>
                        <option value="2">Mouse</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-customer-type">Customer Type:</label>
                    <select id="add-customer-type" name="customer_type" required>
                        <option value="1">Regular</option>
                        <option value="2">Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-payment-type">Payment Type:</label>
                    <select id="add-payment-type" name="payment_type" required>
                        <option value="1">Credit Card</option>
                        <option value="2">Cash</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="add-order-quantity">Quantity:</label>
                    <input type="number" id="add-order-quantity" name="quantity" min="1" required>
                </div>
                <div class="form-group">
                    <label for="add-order-date-time">Date & Time:</label>
                    <input type="datetime-local" id="add-order-date-time" name="date_time" required>
                </div>
                <div class="form-group">
                    <label for="add-order-status">Status:</label>
                    <select id="add-order-status" name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                </div>
                <div class="modal-buttons">
                    <button type="submit" class="btn btn-primary">Add Order</button>
                    <button type="button" class="btn btn-secondary" onclick="closeAddModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection