const email = document.getElementById("email");
const password = document.getElementById("password");
const form = document.getElementById("form");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

// Function to validate the email
const validateEmail = (inputEmail) => inputEmail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);

// Function to validate password
const validatePassword = (inputPassword) => inputPassword.value.trim().length >= 6;

// Function used to display errors
const generateError = (errorName, errorMsg) => {
    if (errorName === "email") {
        emailError.innerText = errorMsg;
        email.parentElement.classList.add("error");
    } else if (errorName === "password") {
        passwordError.innerText = errorMsg;
        password.parentElement.classList.add("error");
    }
}

const formValidate = (inputEmail, inputPassword) => {
    if (inputEmail.value.trim() === "") {
        generateError("email", "Please enter your email address");
        return false;
    }

    if (inputPassword.value.trim() === "") {
        generateError("password", "Please enter your password");
        return false;
    }

    if (!validateEmail(inputEmail)) {
        generateError("email", "Please enter a valid email address");
        return false;
    }

    if (!validatePassword(inputPassword)) {
        generateError("password", "Please enter a valid password");
        return false;
    }

    return true; // Form is valid
}

// Triggers when user submits the form
form.addEventListener("submit", (e) => {
    e.preventDefault();
    formValidate(email, password);
});

// Focusout event listener. Triggers when the user clicks anywhere else besides the input
email.addEventListener("focusout", () => {
    if (email.value.trim() === "") {
        generateError("email", "Please enter your email address");
    } else if (!validateEmail(email)) {
        email.style.borderColor = "red";
        generateError("email", "Please enter a valid email address");
    } else {
        email.style.borderColor = ""; // Clear the red border
        emailError.innerText = ""; // Clear the error message
        email.parentElement.classList.remove("error");
    }
});

// Focusout event listener triggers when the user clicks anywhere else besides the input
password.addEventListener("focusout", () => {
    if (password.value.trim() === "") {
        generateError("password", "Please enter your password");
    } else if (!validatePassword(password)) {
        password.style.borderColor = "red";
        generateError("password", "Please enter a valid password");
    } else {
        password.style.borderColor = ""; // Clear the red border
        passwordError.innerText = ""; // Clear the error message
        password.parentElement.classList.remove("error");
    }
});
