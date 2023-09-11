<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    body {
        background-color: #f7f7f7;
    }

    .container {
        text-align: center;
        padding: 100px;
    }

    .btn-container {
        margin-top: 20px;
    }

    .btn-primary {
        margin: 10px;
        padding: 15px 30px;
        font-size: 18px;
        border-radius: 30px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="font-style: italic;">Welcome to SS Store</h1>
        <p style="font-style: italic;">We offer a variety of services to help you!</p>

        <div class="btn-container">
            <a href="{{ route('user.show_login') }}" class="btn btn-outline-info">Login</a>
            <a href="{{ route('user.show_reg') }}" class="btn btn-outline-info">Sign Up</a>
        </div>
    </div>
</body>

</html>