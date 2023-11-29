const user = document.getElementById("user");
const senha = document.getElementById("senha");
const confirmaSenha = document.getElementById("confirmaSenha");
const botaoConfirma = document.getElementById("botaoConfirma");

botaoConfirma.addEventListener('click', function() {
    if (user.value === '' || senha.value === '' || confirmaSenha.value === '' ) {
        alert('Por favor, preencha todos os campos');
    }
});