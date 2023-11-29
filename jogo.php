<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Typing</title>
    <link rel="stylesheet" href="estilizaJogo.css">
</head>
<body>

    <div class="container-pontuação">
        <h1 id="score">SCORE</h1>
        <div id="pontuação">0</div>
    </div>

    <div class="container-cronometro">
        <h1 id="timer">TIME</h1>
        <div id="segundos">60s</div>
    </div>

    <div id="palavra"></div>
    
    <div class="container-jogo">
        <input type="text" id="entrada" autocomplete="off" autofocus>
    </div>

    <div id="container-letras">
        <div id="linhaUm">
            <div class="tecla">A</div>
            <div class="tecla">B</div>
            <div class="tecla">C</div>
            <div class="tecla">D</div>
            <div class="tecla">E</div>
            <div class="tecla">F</div>
            <div class="tecla">G</div>
            <div class="tecla">H</div>
            <div class="tecla">I</div>
            <div class="tecla">J</div>
            <div class="tecla">K</div>
            <div class="tecla">L</div>
            <div class="tecla">M</div>
            <div class="tecla">N</div>
            <div class="tecla">O</div>
            <div class="tecla">P</div>
            <div class="tecla">Q</div>
            <div class="tecla">R</div>
        </div>
        <div id="linhaDois">
            <div class="tecla">S</div>
            <div class="tecla">T</div>
            <div class="tecla">U</div>
            <div class="tecla">V</div>
            <div class="tecla">W</div>
            <div class="tecla">X</div>
            <div class="tecla">Y</div>
            <div class="tecla">Z</div>
            <div class="tecla">a</div>
            <div class="tecla">b</div>
            <div class="tecla">c</div>
            <div class="tecla">d</div>
            <div class="tecla">e</div>
            <div class="tecla">f</div>
            <div class="tecla">g</div>
            <div class="tecla">h</div>
            <div class="tecla">i</div>
            <div class="tecla">j</div>
        </div>
        <div id="linhaTres">
            <div class="tecla">k</div>
            <div class="tecla">l</div>
            <div class="tecla">m</div>
            <div class="tecla">n</div>
            <div class="tecla">o</div>
            <div class="tecla">p</div>
            <div class="tecla">q</div>
            <div class="tecla">r</div>
            <div class="tecla">s</div>
            <div class="tecla">t</div>
            <div class="tecla">u</div>
            <div class="tecla">v</div>
            <div class="tecla">w</div>
            <div class="tecla">x</div>
            <div class="tecla">y</div>
            <div class="tecla">z</div>
        </div>
    </div>

    <script src="jogo.js"></script>
</body>
</html>