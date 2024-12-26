document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("edit-modal");
    const closeModal = document.querySelector(".close-modal");
    const editButtons = document.querySelectorAll(".edit-button");
    const editForm = document.getElementById("edit-form");
    const saveButton = document.querySelector(".save-button");

    let isEditing = false; // Flag para diferenciar edição e adição

    // Abrir modal para edição
    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const row = button.parentElement.parentElement;
            const id = row.getAttribute("data-id"); // Certifique-se de que o ID esteja na linha ou no botão
            const crm = row.querySelector("td:nth-child(1)").textContent.trim();
            const firstName = row.querySelector("td:nth-child(2)").textContent.trim();
            const lastName = row.querySelector("td:nth-child(3)").textContent.trim();
            const phone = row.querySelector("td:nth-child(4)").textContent.trim();
            const email = row.querySelector("td:nth-child(5)").textContent.trim();
    
            // Preencher os campos do modal
            document.getElementById("doctor-id").value = id; // Atualize o campo oculto de ID
            document.getElementById("doctor-crm").value = crm;
            document.getElementById("doctor-first-name").value = firstName;
            document.getElementById("doctor-last-name").value = lastName;
            document.getElementById("doctor-phone").value = phone;
            document.getElementById("doctor-email").value = email;
    
            // Mostrar o modal
            modal.classList.remove("hidden");
            modal.style.display = "flex";
        });
    });
    
    // Fechar modal
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.style.display = "none";
    });

    // Enviar formulário
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const crm = document.getElementById("doctor-crm").value;
        const id = document.getElementById("doctor-id").value;
        const name = document.getElementById("doctor-first-name").value;
        const lastname = document.getElementById("doctor-last-name").value;
        const phone = document.getElementById("doctor-phone").value;
        const email = document.getElementById("doctor-email").value;

        const endpoint = "../../../Controllers/update-doctor.php";

        // Enviar os dados para o servidor
        fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id, name, lastname, crm, phone, email }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Médico atualizado com sucesso!");
                    console.log({ id, name, lastname, crm, phone, email });
                    modal.classList.add("hidden");
                    location.reload(); // Atualizar página
                } else {
                    console.log("Falha na atualização.", false);
                }
            })
            .catch(error => {
                console.error("Erro:", error);
                console.log("Ocorreu um erro.", false);
            });
    });
});
