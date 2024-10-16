    // Função que adiciona a classe 'visible' aos elementos visíveis na tela
    function handleScrollAnimation(element) {
        var position = element.getBoundingClientRect().top;
        var screenPosition = window.innerHeight / 1.2;

        if (position < screenPosition) {
            element.classList.add('visible');
        }
    }

    // Quando a página for rolada
    window.addEventListener('scroll', function() {
        // Seleciona os títulos e tabelas
        var buildersTitle = document.querySelector('.builders-title');
        var buildersTable = document.querySelector('.builders-tabela-container');
        var driversTitle = document.querySelector('.drivers-title');
        var driversTable = document.querySelector('.drivers-tabela-container');

        // Aplica a animação ao título e à tabela
        handleScrollAnimation(buildersTitle);
        handleScrollAnimation(buildersTable);
        handleScrollAnimation(driversTitle);
        handleScrollAnimation(driversTable);
    });