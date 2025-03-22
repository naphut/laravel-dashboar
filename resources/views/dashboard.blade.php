@extends('layouts.app')

@section('title', 'Store Dashboard')

@section('header-title', 'Store Dashboard')

@section('content')
    <div class="widgets">
        <!-- Total Sales Widget -->
        <div class="widget sales-widget">
            <h3>Today's Sales</h3>
            <div class="sales-amount">${{ number_format($sales, 2) }}</div>
            <div class="sales-trend">{{ $salesTrend }}</div>
        </div>
        <!-- Total Orders Widget -->
        <div class="widget orders-widget">
            <h3>Total Orders</h3>
            <div class="orders-count">{{ $orders }}</div>
            <div class="orders-trend">{{ $ordersTrend }}</div>
        </div>
        <!-- Total Products Widget -->
        <div class="widget products-widget">
            <h3>Total Products</h3>
            <div class="products-count">{{ $products }}</div>
            <div class="products-trend">{{ $productsTrend }}</div>
        </div>
    </div>
@endsection