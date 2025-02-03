// Wait until the DOM content is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent form submission for validation
        
        // Collect form inputs
        const firstName = document.querySelector("input[placeholder='Enter your name']").value.trim();
        const middleName = document.querySelector("input[placeholder='Enter your middle name']").value.trim();
        const lastName = document.querySelector("input[placeholder='Enter your last name']").value.trim();
        const username = document.querySelector("input[placeholder='Enter your username']").value.trim();
        const email = document.querySelector("input[placeholder='Enter your email']").value.trim();
        const password = document.querySelector("input[placeholder='Enter your Password']").value.trim();
        const confirmPassword = document.querySelector("input[placeholder='Confirm your password']").value.trim();
        const gender = document.querySelector("input[name='gender']:checked");

        // Error messages
        if (!firstName || !middleName || !lastName || !username || !email || !password || !confirmPassword) {
            alert("All fields are required.");
            return;
        }

        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return;
        }

        if (!gender) {
            alert("Please select a gender.");
            return;
        }

        // If all validations pass
        alert("Registration successful! Thank you for registering.");
        form.reset(); // Clear the form
    });

    // Email validation function
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
