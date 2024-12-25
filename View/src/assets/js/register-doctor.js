document.addEventListener('DOMContentLoaded', () => {
    fetch('../../../Controllers/SpecialtyController')
        .then(response => response.json())
        .then(data => {
            const specialtySelect = document.getElementById('especialidade');
            if (Array.isArray(data)) {
                data.forEach(specialty => {
                    const option = document.createElement('option');
                    option.value = specialty.idEspecialidade;
                    option.textContent = specialty.nome;
                    specialtySelect.appendChild(option);
                });
            } else {
                console.error('Erro ao carregar especialidades:', data.error || 'Resposta inesperada');
            }
        })
        .catch(error => console.error('Erro na requisição:', error));
});

const form = document.querySelector('form#register-form');
const responseDiv = document.querySelector('.response-container');

if (form) form.addEventListener('submit', sendFormAjax);

async function sendFormAjax(evt) {
    try {
        evt.preventDefault(); 

        const formData = new FormData(form);
        
        const req = await fetch('/careDesk/Controllers/MedicoController.php?action=register', {
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


    console.log('aqui')
    //ocorreu algum erro ??? 
    if(data.success == 'false') {
        data.errors.forEach(error => {
            const paragraph     = document.createElement('p')
            paragraph.innerText = error
            responseDiv.appendChild(paragraph)
        });
        return 
    }
   
    if (data.success === 'true') { 
        console.log('caiu aqui')
        responseDiv.innerHTML = ''
        responseDiv.innerHTML = 'Salvo com sucesso'
    }

}
