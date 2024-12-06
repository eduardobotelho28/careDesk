
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');

togglePassword.addEventListener('click', () => {
  // Alterna o tipo de input entre "password" e "text"
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;

  // Alterna o ícone entre olho aberto e fechado
  togglePassword.classList.toggle('fa-eye');
  togglePassword.classList.toggle('fa-eye-slash');
})