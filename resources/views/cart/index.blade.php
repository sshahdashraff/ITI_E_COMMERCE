<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="{{ asset('assets/css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">

<body>

    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $id) }}">Profile</a></li>
            <li><a href="{{ route('category.user_category', $id) }}">Categories</a></li>
            <li><a href="{{ route('product.user_product', $id) }}">Products</a></li>
            <li><a href="#">Cart</a></li>
        </ul>
    </nav>
    <main>
        @foreach ($items as $item)
        <section class="cart">
            <h2>Your Cart-added Item</h2>
            <ul class"cart-items">
                <li class="cart-item">
                    <td><img src="{{ asset('images/' . $item->product->product_picture) }}" alt="Image"></td>
                    <div class="item-details">
                        <h3>Product: {{ $item->product->name }}</h3>
                        <p>Price: {{ $item->product->price }}</p>
                        <p>Quantity: {{ $item->quantity }}</p>
                    </div>
                </li>

            </ul>

            <div class="cart-total">
                <p>Total: {{ $item->total_price }}</p>
                <button class="checkout-button">Checkout</button>
            </div>
        </section>
        @endforeach
    </main>

    <footer>
        <p>&copy; SS Store</p>
    </footer>
</body>

</html>