const form         = document.querySelector('form#register-form')
const responseDiv  = document.querySelector('.response-container')

if (form) form.addEventListener('submit', send_form_ajax)

async function send_form_ajax (evt) {

    try {

        evt.preventDefault()

        const formData = new FormData(form)

        const req = await fetch('/careDesk/Controllers/UserController.php?action=register', {
            method : "POST",
            body   : formData
        })

        const res = await req.json()

        treat_response(res)

        
    } catch (error) {
        console.log(error)
    }

}

//trata a resposta do servidor, colocando na DOM pro usuário pode ver.
function treat_response (data) {

    console.log(data)
    if(data.success == 'false') {
        data.errors.forEach(error => {
            const paragraph     = document.createElement('p')
            paragraph.innerText = error
            responseDiv.appendChild(paragraph)
        });
    }
}