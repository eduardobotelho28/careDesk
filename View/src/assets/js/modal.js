function showNotification(message, isSuccess = true) {
    const notification = document.getElementById("notification");

    // Configura a mensagem e a cor
    notification.textContent = message;
    notification.classList.remove("hidden", "error");
    notification.classList.add("show");

    if (!isSuccess) {
        notification.classList.add("error");
    }

    // Remove a notificação após 3 segundos
    setTimeout(() => {
        notification.classList.remove("show");
        setTimeout(() => notification.classList.add("hidden"), 500);
    }, 3000);
}

document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("edit-modal");
    const closeModal = document.querySelector(".close-modal");
    const editButtons = document.querySelectorAll(".edit-button");
    const editForm = document.getElementById("edit-form");

    // Abrir o modal ao clicar no botão "Edit"
    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const serviceId = button.getAttribute("data-id");
            const serviceName = button.getAttribute("data-nome");
            const servicePrice = button.getAttribute("data-preco");

            // Preencher os campos do modal
            document.getElementById("service-id").value = serviceId;
            document.getElementById("service-name").value = serviceName;
            document.getElementById("service-price").value = servicePrice;

            // Mostrar o modal
            modal.classList.remove("hidden");
            modal.style.display = "flex";
        });
    });

    // Fechar o modal
    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");
        modal.style.display = "none";
    });

    // Função para exibir notificação
    function showNotification(message, isSuccess = true) {
        const notification = document.getElementById("notification");

        // Configurar mensagem e estilo
        notification.textContent = message;
        notification.classList.remove("hidden", "error");
        notification.classList.add("show");

        if (!isSuccess) {
            notification.classList.add("error");
        }

        // Esconder a notificação após 3 segundos
        setTimeout(() => {
            notification.classList.remove("show");
            setTimeout(() => notification.classList.add("hidden"), 500); // Esconde após o fade-out
        }, 3000);
    }

    // Enviar o formulário de edição
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const id = document.getElementById("service-id").value;
        const name = document.getElementById("service-name").value;
        const price = document.getElementById("service-price").value;

        console.log({ id, name, price });

        // Enviar os dados para o servidor via fetch
        fetch("update-register.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id, name, price }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification("Service updated successfully!"); // Exibe a notificação
                modal.classList.add("hidden"); // Fecha o modal imediatamente
                modal.style.display = "none"; // Garante que o modal seja escondido
                // Atualiza a página após 3 segundos
                setTimeout(() => {
                    location.reload();
                }, 3000);
            } else {
                showNotification("Failed to update service.", false); // Exibe notificação de falha
            }
        })
        .catch(error => {
            console.error("Error:", error);
            showNotification("An error occurred.", false); // Exibe notificação de erro
        });
    });
});
