<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/user_products.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <title>Products - SS Store</title>
</head>

<body>
    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $id) }}">Profile</a></li>
            <li><a href="{{ route('category.user_category', $id) }}">Categories</a></li>
            <li><a href="{{ route('product.user_product', $category) }}">Products</a></li>
            <li><a href="{{ route('cart.index',$id ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>
    <h2>Products</h2>
    <section class="product-list">
        {{-- <h2>All Products</h2> --}}
        @foreach ($products as $product)
        <div class="product">
            {{-- <img src="product.jpg" alt="Product"> --}}
            <img src="{{ asset('images/' . $product->product_picture) }}" alt="Product">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->availability }}</p>
            <span class="price">${{ $product->price }}</span>

        </div>
        @endforeach
    </section>

    <footer>
        <p>&copy; SS Store</p>
    </footer>
</body>

</html>