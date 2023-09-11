<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('category.edit', $category->id) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @method('PUT')
                @csrf
                <input type="text" name="name" value="{{ $category->name }}">
                <img src="{{ asset('images/' . $category->picture) }}" alt="Image">
                <input class="btn btn-outline-dark" type="file" name="picture">
                <input type="text" name="availability" value="{{ $category->availability }}">
                <input type="text" name="price" value="{{ $category->price }}">
                <input type="text" name="id" value="{{ $category->id }}">
                <input type="text" name="admin_id" value="{{ $category->admin_id }}">
                <br>
                <br>
                <button class="btn btn-outline-info" type="submit">Submit</button>
            </div>
        </form>
        <button class="btn btn-outline-dark" onclick="location='/categorys'">back</button>
    </div>
    <style>
    button {
        margin-bottom: 5px;
    }

    input {
        border: 1px solid black;
        border-radius: 10px;
    }

    img {
        padding: 5px;
        padding-bottom: 10px;
    }
    </style>
</body>

</html>