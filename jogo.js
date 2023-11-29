const entrada = document.getElementById("entrada");
const letrasContainer = document.getElementById("container-letras");

entrada.addEventListener("input", () => {
    const ultimaLetraDigitada = entrada.value.slice(-1);

    const todasLetras = letrasContainer.querySelectorAll(".tecla");
    todasLetras.forEach(letra => {
        if (letra.textContent === ultimaLetraDigitada) {
            letra.style.color = "red";
            setTimeout(() => {
                letra.style.color = "yellow";
            }, 1000);
        }
    });
});

const palavras = ["Programação", "Desenvolvimento", "SQL", "Codificação", "Algoritmo", "Banco de dados", "Servidor", "Segurança", "Redes", "Linguagem de programação", "Web", "Nuvem", "Software", "Hardware", "Framework", "Armazenamento", "Interface de usuário", "Sistemas operacionais", "Cibersegurança", "Firewall", "Big Data", "Inteligência Artificial", "Faculdade", "Análise e Desenvolvimento de Sistemas", "Realidade Virtual", "Internet das Coisas", "Desenvolvimento Ágil", "Automação", "UFPR", "Script", "Compilação", "Git", "Banco de Dados", "Estágio", "Desenvolvedor Web", "Cibersegurança", "Redes Neurais", "Criptografia", "Programação Orientada a Objetos", "Python", "JavaScript", "PHP", "Java", "HTML", "CSS", "Node.js", "React", "Angular", "Interação Humano Computador", "Robótica", "Jogos Eletrônicos"];

const palavraElement = document.getElementById("palavra");
const pontuacaoElement = document.getElementById("pontuação");
const segundosElement = document.getElementById("segundos");

let pontuacao = 0;
let segundos = 60;
let cronometro;

function escolherPalavraAleatoria() {
    const indiceAleatorio = Math.floor(Math.random() * palavras.length);
    return palavras[indiceAleatorio];
}

function iniciarJogo() {
    entrada.value = "";
    entrada.focus();
    const palavraAleatoria = escolherPalavraAleatoria();
    palavraElement.textContent = palavraAleatoria;
}

function atualizarPontuacao() {
    pontuacao++;
    pontuacaoElement.textContent = pontuacao;
}

function verificarEntrada() {
    const palavraAtual = palavraElement.textContent;
    if (entrada.value === palavraAtual) {
        atualizarPontuacao();
        iniciarJogo();
    }
}

function atualizarCronometro() {
    segundos--;
    segundosElement.textContent = segundos + "s";
    if (segundos === 0) {
        clearInterval(cronometro);
        gameOver();
    }
}

function gameOver() {
    console.log("Pontuação a ser enviada: " + pontuacao);
    alert("Fim de jogo! Sua pontuação foi " + pontuacao + ". Pontuação salva com sucesso!");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "pontuacao.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
            window.location.href = "welcome.php";
        }
    };

    const dados = "pontuacao=" + pontuacao;

    xhr.send(dados);
}

entrada.addEventListener("input", verificarEntrada);

iniciarJogo();

cronometro = setInterval(atualizarCronometro, 1000);