@extends('layouts.app')

@section('title', 'Products')
@section('header-title', 'Products Management')

@section('content')
<div class="products-container">
    <!-- Products Header -->
    <div class="products-header">
        <div class="header-actions">
            <h2>All Products</h2>
            <div class="actions">
                <a href="{{ route('products.create') }}" class="btn btn-primary">+ Add New Product</a>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="table-container">
        <table class="products-table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td><input type="checkbox" class="product-checkbox" value="{{ $product->id }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <span class="status {{ $product->status === 'active' ? 'active' : 'inactive' }}">
                            {{ $product->status }}
                        </span>
                    </td>
                    <td>{{ $product->description ?? 'N/A' }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-small btn-edit">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-small btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="no-data">No products found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>

<script>
document.getElementById('select-all').addEventListener('change', function() {
    document.querySelectorAll('.product-checkbox').forEach(cb => {
        cb.checked = this.checked;
    });
});
</script>
@endsection