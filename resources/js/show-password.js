// Function to toggle password visibility
function togglePasswordVisibility(toggleSvgClass, passwordFieldClass) {
    const toggleSvgs = document.querySelectorAll(toggleSvgClass);

    toggleSvgs.forEach(svg => {
        svg.addEventListener('click', () => {
            const passwordField = document.querySelector(passwordFieldClass);
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    });
}

// Toggle password visibility for main password field
togglePasswordVisibility('.toggle-password-svg', '.password');

// Toggle password visibility for confirmation password field
togglePasswordVisibility('.toggle-password-confirmation-svg', '.password-confirmation');
