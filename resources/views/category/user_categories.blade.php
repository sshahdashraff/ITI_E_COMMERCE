<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/user_categories.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    <title>Categories - SS Store</title>
</head>

<body>
    <nav class="navigator">
        <ul>
            <li><a href="{{ route('user.profile', $id) }}">Profile</a></li>
            <li><a>Categories</a></li>
            <li><a href="{{ route('product.user_product', $id) }}"> Products</a></li>
            <li><a href="{{ route('cart.index',$id ) }}">Cart</a></li>
        </ul>
    </nav>
    <br>

    <section class="categories">
        <h2>Categories</h2>
        @foreach ($categories as $category)
        <div class="category">
            {{-- <img src="category.jpg" alt="Category"> --}}
            <img src="{{ asset('images/' . $category->picture) }}" alt="Category">
            <h3>{{ $category->name }}</h3>
            <p>#{{ $category->id }}</p>
            <a href="{{ route('category.user_show_products', ['category' => $category, 'id' => $id]) }} ">Show
                Products</a>
        </div>
        @endforeach

    </section>

    <footer>
        <p>&copy; SS Store</p>
    </footer>
</body>

</html>