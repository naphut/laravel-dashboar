@extends('layouts.app')

@section('title', 'Edit Product')
@section('header-title', 'Edit Product')

@section('content')
    <div class="widget">
        <h3>Edit Product</h3>
        <form method="POST" action="{{ route('products.update', $product->Product_ID) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Product_Name">Product Name:</label>
                <input type="text" id="Product_Name" name="Product_Name" value="{{ $product->Product_Name }}" required>
            </div>
            <div class="form-group">
                <label for="Product_Price">Price:</label>
                <input type="number" id="Product_Price" name="Product_Price" step="0.01" min="0" value="{{ $product->Product_Price }}" required>
            </div>
            <div class="form-group">
                <label for="Product_Quantity_Stock">Quantity in Stock:</label>
                <input type="number" id="Product_Quantity_Stock" name="Product_Quantity_Stock" min="0" value="{{ $product->Product_Quantity_Stock }}" required>
            </div>
            <div class="form-group">
                <label for="Product_Status">Status:</label>
                <select id="Product_Status" name="Product_Status" required>
                    <option value="Active" {{ $product->Product_Status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $product->Product_Status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Product_Description">Description:</label>
                <textarea id="Product_Description" name="Product_Description">{{ $product->Product_Description }}</textarea>
            </div>
            <div class="modal-buttons">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
@endsection