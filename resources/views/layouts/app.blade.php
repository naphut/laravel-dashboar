<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - DOKAN</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar" id="sidebar">
            <div class="logo" style="color: rgb(127, 157, 255);">Shop Dashboard</div>
            <ul class="nav">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><span class="icon">🏠</span> <a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="{{ request()->is('leaderboard') ? 'active' : '' }}"><span class="icon">📊</span> <a href="{{ route('leaderboard') }}">Leaderboard</a></li>
                <li id="orders-nav" class="{{ request()->is('orders') ? 'active' : '' }}"><span class="icon">🛒</span> <a href="{{ route('orders') }}" class="orders-link">Orders</a> <span class="badge">{{ \App\Models\Order::count() }}</span></li>
                <li class="{{ request()->is('products*') ? 'active' : '' }}"><span class="icon">📦</span> <a href="{{ route('products') }}">Products</a></li>
                <li class="{{ request()->is('payment-types') ? 'active' : '' }}"><span class="icon">📈</span> <a href="{{ route('payment-types') }}">PaymentType</a></li>
                <li class="{{ request()->is('customer-types*') ? 'active' : '' }}"><span class="icon">👥</span> <a href="{{ route('customer-types') }}">Customer Types</a></li>
                <li class="{{ request()->is('messages') ? 'active' : '' }}"><span class="icon">✉️</span> <a href="{{ route('messages') }}">Messages</a></li>
                <li class="{{ request()->is('settings') ? 'active' : '' }}"><span class="icon">⚙️</span> <a href="{{ route('settings') }}">Settings</a></li>
            </ul>
            <div class="upgrade-box">
                <div class="logo">shop</div>
                <p>Premium</p>
            </div>
        </aside>

        <div class="overlay" id="overlay"></div>

        <main class="main-content">
            <header class="header">
                <div class="menu-toggle" id="menu-toggle">☰</div>
                <h1>@yield('header-title')</h1>
                <div class="header-right">
                    <input type="text" placeholder="Search here..." class="search-bar" id="search-bar">
                    <select id="language-select">
                        <option value="en">ENG (US)</option>
                        <option value="km">Khmer (KM)</option>
                    </select>
                    <span class="notification" id="notification-icon">🔔 <span class="notification-count" id="notification-count">0</span></span>
                    <div class="user" id="user-menu">
                        <span>Admin</span>
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="User">
                        <div class="user-dropdown" id="user-dropdown">
                            <a href="{{ route('settings') }}">Settings</a>
                        </div>
                    </div>
                </div>
            </header>
            <section class="content">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @yield('content')
            </section>
        </main>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>