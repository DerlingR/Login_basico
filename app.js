const registerBtn = document.getElementById('register-btn');
const registrationPanel = document.querySelector('.user-registration');
const recoverBtn = document.getElementById('recover-btn');
const recoverPanel = document.querySelector('.password-recovery');

registerBtn.addEventListener('click', () => {
    registrationPanel.style.display = registrationPanel.style.display === 'none' ? 'block' : 'none';
});

recoverBtn.addEventListener('click', () => {
    recoverPanel.style.display = recoverPanel.style.display === 'none' ? 'block' : 'none';
});

// mostrar/ocultar la contraseña
const togglePasswordVisibility = (passwordField, toggleIcon) => {
    const passwordInput = passwordField.querySelector('input[type="password"]');
    const icon = toggleIcon.querySelector('i');

    const togglePassword = () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    };

    toggleIcon.addEventListener('click', togglePassword);
};

// Obtener todos los campos de contraseña y los iconos de ojo
const passwordFields = document.querySelectorAll('.password-field');
passwordFields.forEach((passwordField) => {
    const toggleIcon = passwordField.querySelector('.toggle-password');
    togglePasswordVisibility(passwordField, toggleIcon);
});