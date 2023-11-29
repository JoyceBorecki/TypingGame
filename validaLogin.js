const entrada = document.getElementById("caixaUser");
const letrasContainer = document.querySelectorAll(".tecla");
const botaoConfirma = document.getElementById('botaoConfirma');
const caixaSenha = document.getElementById('caixaSenha');

entrada.addEventListener("input", () => {
    const ultimaLetraDigitada = entrada.value.slice(-1);

    letrasContainer.forEach(letra => {
        if (letra.textContent === ultimaLetraDigitada) {
            letra.style.color = "red";
            setTimeout(() => {
                letra.style.color = "yellow";
            }, 1000);
        } else {
            letra.style.color = "yellow";
        }
    });
});


botaoConfirma.addEventListener('click', function() {
    if (entrada.value === '' || caixaSenha.value === '') {
        alert('Por favor, preencha todos os campos');
    }
});