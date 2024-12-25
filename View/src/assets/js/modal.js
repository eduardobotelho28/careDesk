function showNotification(message, isSuccess = true) {
    const notification = document.getElementById("notification");

    console.log("Notificação chamada:", message); // Adicionado para depurar

    if (!notification) {
        console.error("Elemento de notificação não encontrado!");
        return;
    }

    // Define o texto e a classe de estilo
    notification.textContent = message;
    notification.classList.remove("hidden");
    notification.classList.add(isSuccess ? "success" : "error");

    // Mostra a notificação por 3 segundos e a remove
    setTimeout(() => {
        notification.classList.add("hidden");
        notification.classList.remove("success", "error");
    }, 3000);
}

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("edit-modal");
    const closeModal = document.querySelector(".close-modal");
    const editButtons = document.querySelectorAll(".edit-button");
    const addButton = document.getElementById("add-service-button");
    const editForm = document.getElementById("edit-form");
    const saveButton = document.querySelector(".save-button");

    let isEditing = false; // Flag para diferenciar adição e edição

    // Abrir modal para edição
    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const serviceId = button.getAttribute("data-id");
            const serviceName = button.getAttribute("data-nome");
            const servicePrice = button.getAttribute("data-preco");

            // Preencher os campos do modal
            document.getElementById("service-id").value = serviceId;
            document.getElementById("service-name").value = serviceName;
            document.getElementById("service-price").value = servicePrice;

            // Alterar o texto do botão
            saveButton.textContent = "Salvar";

            isEditing = true; // Sinalizar modo de edição

            // Mostrar o modal
            modal.classList.remove("hidden");
            modal.style.display = "flex";
        });
    });

    // Abrir modal para adição
    addButton.addEventListener("click", () => {
        // Limpar os campos do modal
        document.getElementById("service-id").value = "";
        document.getElementById("service-name").value = "";
        document.getElementById("service-price").value = "";

        // Alterar o texto do botão
        saveButton.textContent = "Adicionar";

        isEditing = false; // Sinalizar modo de adição

        // Mostrar o modal
        modal.classList.remove("hidden");
        modal.style.display = "flex";
    });

    // Fechar o modal
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.style.display = "none";
    });

    // Enviar o formulário
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const id = document.getElementById("service-id").value;
        const name = document.getElementById("service-name").value;
        const price = document.getElementById("service-price").value;

        // Verificar se está em modo de edição ou adição
        const endpoint = isEditing
            ? "../../../Controllers/update-register.php" // Atualizar
            : "../../../Controllers/insert-register.php"; // Adicionar

        // Enviar os dados para o servidor
        fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id, name, price }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const message = isEditing
                        ? "Service updated successfully!"
                        : "Service added successfully!";
                    showNotification(message);
                    modal.classList.add("hidden");
                    location.reload(); // Atualizar a página
                } else {
                    showNotification("Operation failed.", false);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                showNotification("An error occurred.", false);
            });
    });
});
