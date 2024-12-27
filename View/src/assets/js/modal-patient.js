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
            const firstName = row.querySelector("td:nth-child(1)").textContent.trim();
            const lastName = row.querySelector("td:nth-child(2)").textContent.trim();
            const phone = row.querySelector("td:nth-child(4)").textContent.trim();
            const email = row.querySelector("td:nth-child(5)").textContent.trim();
    
            // Preencher os campos do modal
            document.getElementById("patient-id").value = id; // Atualize o campo oculto de ID
            document.getElementById("patient-first-name").value = firstName;
            document.getElementById("patient-last-name").value = lastName;
            document.getElementById("patient-phone").value = phone;
            document.getElementById("patient-email").value = email;
    
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

        const id = document.getElementById("patient-id").value;
        const name = document.getElementById("patient-first-name").value;
        const lastname = document.getElementById("patient-last-name").value;
        const phone = document.getElementById("patient-phone").value;
        const email = document.getElementById("patient-email").value;

        const endpoint = "../../../Controllers/update-patient.php";
        console.log(id)

        // Enviar os dados para o servidor
        fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id, name, lastname, phone, email }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Paciente atualizado com sucesso!");
                    console.log({ id, name, lastname, phone, email });
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
