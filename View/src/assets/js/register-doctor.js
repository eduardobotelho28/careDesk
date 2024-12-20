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
