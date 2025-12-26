document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");

    if (loginForm) {
        loginForm.addEventListener("submit", function (event) {
            event.preventDefault();

            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            if (email && password) {
                alert("Login Berhasil! Mengarahkan ke Dashboard...");
                window.location.href = "index.html";
            } else {
                alert("Mohon isi email dan password!");
            }
        });
    }

});