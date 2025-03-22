@extends('layouts.app')

@section('title', 'Add Product')
@section('header-title', 'Add Product')

@section('content')
    <div class="widget">
        <h3>Add New Product</h3>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="Product_Name">Product Name:</label>
                <input type="text" id="Product_Name" name="Product_Name" required>
            </div>
            <div class="form-group">
                <label for="Product_Price">Price:</label>
                <input type="number" id="Product_Price" name="Product_Price" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="Product_Quantity_Stock">Quantity in Stock:</label>
                <input type="number" id="Product_Quantity_Stock" name="Product_Quantity_Stock" min="0" required>
            </div>
            <div class="form-group">
                <label for="Product_Status">Status:</label>
                <select id="Product_Status" name="Product_Status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Product_Description">Description:</label>
                <textarea id="Product_Description" name="Product_Description"></textarea>
            </div>
            <div class="modal-buttons">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </form>
    </div>
@endsection