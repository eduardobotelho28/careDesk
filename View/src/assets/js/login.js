
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const form = document.querySelector('form#login-form');
const responseDiv = document.querySelector('.response-container');

togglePassword.addEventListener('click', () => {
  // Alterna o tipo de input entre "password" e "text"
  const type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;

  // Alterna o ícone entre olho aberto e fechado
  togglePassword.classList.toggle('fa-eye');
  togglePassword.classList.toggle('fa-eye-slash');
})


if (form) form.addEventListener('submit', sendFormAjax);

async function sendFormAjax(evt) {
    try {
        evt.preventDefault(); 

        const formData = new FormData(form);
        
        const req = await fetch('/careDesk/Controllers/UserController.php?action=login', {
            method: 'POST',
            body: formData
        });

        const res = await req.json();

        treatResponse(res); 
    } catch (error) {
        console.error(error);
    }
}


function treatResponse(data) {
    responseDiv.innerHTML = '';
    if (data.success === 'false') { 
        data.errors.forEach(error => {
            const paragraph = document.createElement('p');
            paragraph.innerText = error; // Adiciona o erro à resposta
            responseDiv.appendChild(paragraph);
        });
        return;
    }

    //redirecionar 
    // window.location.href = '/careDesk/View/src/pages/dashboard.php';
}
