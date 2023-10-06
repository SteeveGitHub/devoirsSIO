function togglePassword() {
    const passwordInput = document.getElementById("password");
    const togglePasswordButton = document.getElementById("toggle-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordButton.textContent = "👁️";
    } else {
        passwordInput.type = "password";
        togglePasswordButton.textContent = "🙈";
    }
}
