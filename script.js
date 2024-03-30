document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var regUsername = document.getElementById("regUsername").value;
    var regEmail = document.getElementById("regEmail").value;
    var regPassword = document.getElementById("regPassword").value;
    var regPassword2 = document.getElementById("regPassword2").value;

    // Check if the username already exists in local storage
    var existingUser = localStorage.getItem(regUsername);

    if (existingUser !== null) {
        // If the username already exists, display a message
        document.getElementById("registrationMessage").innerText = "Username already exists. Please choose a different one.";
    } else {
        // If the username is unique, store it in local storage
        localStorage.setItem(regUsername, regEmail, regPassword, regPassword2);
        
        alert("Registration Successful! Proceed to login.");
        document.getElementById("registerForm").reset();
        document.getElementById("registrationMessage").innerText = "";
        window.location.href = "login.html"; // Redirect to login page
    }
});

document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var loginUsername = document.getElementById("loginUsername").value;
    var loginPassword = document.getElementById("loginPassword").value;

    // Check if the entered username exists in local storage and if the password matches
    var storedPassword = localStorage.getItem(loginUsername);

    if (storedPassword === loginPassword) {
        alert("Login Successful!");
        window.location.href = "index.html"; // Redirect to index page
    } else {
        alert("Invalid username or password!");
        document.getElementById("loginForm").reset();
    }
});
