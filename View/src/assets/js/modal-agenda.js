document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("edit-modal");
    const closeModal = document.querySelector(".close-modal");
    const editButtons = document.querySelectorAll(".edit-button");
    const editForm = document.getElementById("edit-form");

    // Abrir modal para edição
    editButtons.forEach(button => {
        button.addEventListener("click", () => {
            const row = button.parentElement.parentElement;
            const id = row.getAttribute("data-id");
            const dataHora = row.querySelector("td:nth-child(2)").textContent.trim();
            const status = row.querySelector("td:nth-child(3)").textContent.trim();
            const pacienteNome = row.querySelector("td:nth-child(4)").textContent.trim();
            const medicoNome = row.querySelector("td:nth-child(5)").textContent.trim();

            // Formatar dataHora corretamente para o input datetime-local
            const formattedDataHora = new Date(dataHora).toISOString().slice(0, 16);

            // Preencher os campos do modal
            document.getElementById("consulta-id").value = id;
            document.getElementById("consulta-dataHora").value = formattedDataHora;
            document.getElementById("consulta-status").value = status;
            document.getElementById("consulta-paciente_nome").value = pacienteNome;
            document.getElementById("consulta-medico_nome").value = medicoNome;

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

        const id = document.getElementById("consulta-id").value;
        const dataHora = document.getElementById("consulta-dataHora").value;
        const status = document.getElementById("consulta-status").value;
        const pacienteNome = document.getElementById("consulta-paciente_nome").value;
        const medicoNome = document.getElementById("consulta-medico_nome").value;

        const endpoint = "../../../Controllers/update-agenda.php";

        // Enviar os dados para o servidor
        fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ id, dataHora, status, pacienteNome, medicoNome }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log("Consulta atualizada com sucesso!");

                // Atualizar a linha da tabela
                const row = document.querySelector(`tr[data-id='${id}']`);
                row.querySelector("td:nth-child(2)").textContent = new Date(dataHora).toLocaleString('pt-BR').replace(",", " -");
                row.querySelector("td:nth-child(3)").textContent = status;
                row.querySelector("td:nth-child(4)").textContent = pacienteNome;
                row.querySelector("td:nth-child(5)").textContent = medicoNome;

                // Fechar o modal
                modal.classList.add("hidden");
                modal.style.display = "none";
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
