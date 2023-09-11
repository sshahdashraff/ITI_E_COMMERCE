<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="navigator">
        <ul>
            <li><a>Profile</a></li>
            <li><a href="{{ route('category.user_category', $user['id'] ?? '') }}">Categories</a></li>
            <li><a href="{{ route('product.user_product',$user['id'] ?? '' ) }}"> Products</a></li>
            <li><a href="{{ route('cart.index',$user['id'] ?? '' ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>
    <header>
        <h1>User Profile</h1>
    </header>

    <main class="profile">
        <section class="user-info">
            <h2>User Info</h2>
            <p><strong>Name:</strong> {{ $user->name ?? 'Unknown' }}</p>
            <p><strong>Email:</strong> {{ $user->email ?? 'Unknown' }}</p>
            {{-- <p><strong>Address:</strong> 123 Main St, City, Country</p> --}}
        </section>
        <br>
    </main>

    <footer>
        <p>&copy; SS Store</p>
    </footer>
</body>

</html>