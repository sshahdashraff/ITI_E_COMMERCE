<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <table>
            <thead>
                <tr>
                    <th>category Id</th>
                    <th>category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    {{-- <td><img src="{{ asset('images/' . $category->picture) }}" alt="Image"></td> --}}
                    <td><button class="btn btn-outline-dark" onclick="location='/category'">back</button></td>
                </tr>
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