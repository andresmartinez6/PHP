document.addEventListener("DOMContentLoaded", function() {
    const elementoMovil = document.querySelector(".elemento-movil");

    function moverElementoAleatoriamente() {
        const maxX = window.innerWidth - elementoMovil.clientWidth;
        const maxY = window.innerHeight - elementoMovil.clientHeight;

        const randomX = Math.random() * maxX;
        const randomY = Math.random() * maxY;

        elementoMovil.style.left = randomX + "px";
        elementoMovil.style.top = randomY + "px";
    }

    // Utiliza un temporizador para mover el elemento periódicamente
    setInterval(moverElementoAleatoriamente, 8000); // Cambia el valor de 3000 para ajustar la velocidad de movimiento
});
