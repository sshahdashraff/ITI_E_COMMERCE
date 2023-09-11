<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('product.create') }}" method="get">
            <button class="btn btn-outline-info  btn-lg">Add a new product</button>
        </form>
        <form action="{{ route('category.index') }}" method="get">
            <button class="btn btn-outline-dark">back</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product price</th>
                    <th>Product availablity</th>
                    {{-- <th>Product picture</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->availability }}</td>
                    {{-- <td><img src="{{ asset('images/' . $product->picture) }}" alt="Image"></td> --}}
                    <td>
                        <form action="{{ route('product.show', $product->id) }}" method="get">
                            <button class="btn btn-outline-info">Show</button>
                        </form>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                        </form>

                        <form action="{{ route('product.update', $product->id) }}">
                            <button class="btn btn-outline-dark" type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <style>
    button {
        margin-bottom: 5px;
    }

    th {
        padding: 8px;
        border: 1px solid black;
    }

    td {
        padding: 8px;
        border: 1px solid black;
    }

    table {
        border: 1px solid black;
    }
    </style>
</body>

</html>