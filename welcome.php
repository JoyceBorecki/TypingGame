<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Typing</title>
    <link rel="stylesheet" href="estilizaWelcome.css">
</head>
<body>

<?php
session_start();
require_once "conexao.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $id_usuario = $_SESSION["id"];
    $username = $_SESSION["username"];

    try {
        $sql_usuario = "SELECT pontuacao, data_hora
                        FROM pontuacoes
                        WHERE id_usuario = :id_usuario
                        ORDER BY data_hora DESC";

        $stmt_usuario = $pdo->prepare($sql_usuario);
        $stmt_usuario->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt_usuario->execute();

        echo "<h1 class='my-5'><b>$username</b>, bem-vindo(a) ao Retro Typing!</h1>";

        while ($row_usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC)) {
            $data_formatada = date("d-m-Y H:i:s", strtotime($row_usuario['data_hora']));
            echo "<p>Sua Pontuação: " . $row_usuario['pontuacao'] . " - Data/Hora: " . $data_formatada . "</p>";
        }

        $sql_ranking = "SELECT users.username, MAX(pontuacoes.pontuacao) as pontuacao
                        FROM users
                        LEFT JOIN pontuacoes ON users.id = pontuacoes.id_usuario
                        GROUP BY users.id
                        ORDER BY pontuacao DESC
                        LIMIT 10";

        $stmt_ranking = $pdo->prepare($sql_ranking);
        $stmt_ranking->execute();
        echo "<br>";
        echo "<h2>Top 10 Pontuações Gerais:</h2>";
        while ($row_ranking = $stmt_ranking->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>{$row_ranking['username']} - Pontuação: {$row_ranking['pontuacao']}</p>";
        }

        echo "<br>";
        echo "<a href='jogo.php' class='btn btn-warning'>Jogar</a>";
        echo "<br>";
        echo "<br>";
        echo "<a href='logout.php' class='btn btn-danger ml-3'>Sair da conta</a>";
    } catch (PDOException $e) {
        echo "Erro ao buscar informações de pontuação: " . $e->getMessage();
    }
} else {
    echo "Usuário não está logado.";
}
?>
</body>
</html>