<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('assets/css/registration.css') }}" rel="stylesheet">

</head>

<body>
    <br>
    <div id="form-container">
        <form id="myForm" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">

            <h2>Registration</h2>
            <fieldset id="fieldset">
                <div id="mydiv">
                    @csrf
                    <legend>Your Info</legend>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your Name" minlength="3" required>
                    <br>
                    <span id="nameError" class="error"></span>
                    <br>
                    <label for="email">Email</label>
                    <input type="email" id="emaill" name="email" placeholder="Enter your email" required>
                    <br>
                    <span id="emailError" class="error"></span>
                    <br>
                    <label for="password">Password</label>
                    <div class="password-input-container">
                        <input type="password" id="pass" name="password" placeholder="Enter your password"
                            autocomplete="current-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required>
                        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                    </div>
                    <span id="passwordError" class="error"></span>
                    {{-- <br> --}}

                </div>

                <br>
                <div class="buttons">
                    <input class="rounded-button" type="submit" value="Submit">
                    <input class="rounded-button" type="reset" value="Reset">
                </div>
                <p>Already have an account? <a href="{{ route('user.show_login') }}">Login</a></p>
    </div>

    </fieldset>
    </form>
    </div>
    <script src="{{ asset('assets/js/reg_validate.js') }}"></script>
    <script src="{{ asset('assets/js/toggle.js') }}"></script>
</body>

</html>