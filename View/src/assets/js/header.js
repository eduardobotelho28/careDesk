document.addEventListener('DOMContentLoaded', () => {
    console.log("JavaScript carregado!"); // Testa se o script foi executado

    const expandButton = document.getElementById('expand-button');
    const userMenu = document.getElementById('user-menu');

    const toggleMenu = () => {
        console.log("Botão clicado!"); // Testa se o clique é detectado
        userMenu.classList.toggle('hidden');
    };

    expandButton.addEventListener('click', toggleMenu);

    document.addEventListener('click', (event) => {
        if (!expandButton.contains(event.target) && 
            !userMenu.contains(event.target)) {
            console.log("Fechando menu...");
            userMenu.classList.add('hidden');
        }
    });
});
