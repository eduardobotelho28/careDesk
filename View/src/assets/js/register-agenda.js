// Register agenda script
document.addEventListener('DOMContentLoaded', () => {
    console.log("JavaScript carregado!3");
    const registerForm = document.getElementById('register-form');
    const responseContainer = document.querySelector('.response-container');

    // Validação e envio do formulário
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
    
        const formData = new FormData(registerForm);
    
        try {
            const response = await fetch('/careDesk/Controllers/ConsultationController.php', {
                method: 'POST',
                body: formData,
            });
    
            if (!response.ok) {
                throw new Error(`Erro na resposta: ${response.status}`);
            }
    
            const result = await response.json();
    
            // Exibir mensagem de status
            responseContainer.innerHTML = '';
            const message = document.createElement('p');
            message.textContent = result.message;
            message.classList.add(result.success ? 'success' : 'error');
            responseContainer.appendChild(message);
    
            if (result.success) {
                registerForm.reset();
            }
        } catch (error) {
            console.error(error);
            responseContainer.innerHTML = '<p class="error">Erro ao registrar consulta. Tente novamente.</p>';
        }
    });
    
});
