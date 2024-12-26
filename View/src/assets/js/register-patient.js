const form = document.querySelector('form#register-form');
const responseDiv = document.querySelector('.response-container');

console.log('oi')

if (form) form.addEventListener('submit', sendFormAjax);

async function sendFormAjax(evt) {
    try {
        evt.preventDefault(); 

        const formData = new FormData(form);
        
        const req = await fetch('/careDesk/Controllers/PacienteController.php?action=register', {
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
        responseDiv.innerHTML = ''
        responseDiv.innerHTML = 'Salvo com sucesso'
    }

}