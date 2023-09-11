<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/user_products.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <title>All Products - SS Store</title>
</head>

<body>
    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $id) }}">Profile</a></li>
            <li><a href="{{ route('category.user_category', $id) }}">Categories</a></li>
            <li><a> Products</a></li>
            <li><a href="{{ route('cart.index',$id ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>
    <section class="search-bar">
        <form action="{{ route('user_products.search', $id) }}" method="GET" enctype="multipart/form-data">
            <input type="text" name="query" placeholder="Search for products...">
            <button type="submit">Search</button>
        </form>
    </section>
    <h2>Products</h2>
    <section class="product-list">

        @foreach ($products as $product)
        <div class="product">
            <form method="POST" action="{{ route('cart.add', ['productId' => $product->id, 'id' => $id]) }}">
                @csrf

                <img src="{{ asset('images/' . $product->product_picture) }}" alt="Product">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->availability }}</p>
                <span class="price">${{ $product->price }}</span>
                <div class="quantity-container">
                    <label class="quantity-label" for="quantity">Quantity:</label>
                    <input class="quantity-input" type="number" id="quantity" name="quantity" value="1" min="1">
                    <button type="submit" class="add-to-cart-button">Add to Cart</button>
                </div>
            </form>
        </div>
        @endforeach
    </section>

    <footer>
        <p>&copy; SS Store</p>
    </footer>
</body>

</html>