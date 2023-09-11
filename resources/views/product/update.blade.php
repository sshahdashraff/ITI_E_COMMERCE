<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('product.edit', $product->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @method('PUT')
                @csrf
                <input type="text" name="name" value="{{ $product->name }}">
                <img src="{{ asset('images/' . $product->product_picture) }}" alt="Image">
                <input class="btn btn-outline-dark" type="file" name="product_picture">
                <input type="text" name="availability" value="{{ $product->availability }}">
                <input type="text" name="price" value="{{ $product->price }}">
                <input type="text" name="category_id" value="{{ $product->category_id }}">
                <input type="text" name="admin_id" value="{{ $product->admin_id }}">
                <br>
                <br>
                <button class="btn btn-outline-info" type="submit">Submit</button>
            </div>
        </form>
        <button class="btn btn-outline-dark" onclick="location='/products'">back</button>
    </div>
    <style>
    button {
        margin-bottom: 5px;
    }

    input {
        border: 1px solid black;
        border-radius: 2px;
    }

    img {
        padding: 5px;
        padding-bottom: 10px;
    }
    </style>
</body>

</html>