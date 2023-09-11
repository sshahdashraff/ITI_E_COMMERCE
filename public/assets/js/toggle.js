function togglePasswordVisibility() {
    var passwordInput = document.getElementById("pass");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }

}
