const form = document.querySelector('form#register-form')

if (form) form.addEventListener('submit', send_form_ajax)

async function send_form_ajax (evt) {

    evt.preventDefault()

    const formData = new FormData(form)

    const req = await fetch('/careDesk/Controllers/UserController.php/?action=register', {
        method : "POST",
        body   : formData
    })

    const res = await req.json()
}