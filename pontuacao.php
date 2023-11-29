<?php
session_start();
require_once "conexao.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $id_usuario = $_SESSION["id"];
    $pontuacao = isset($_POST['pontuacao']) ? intval($_POST['pontuacao']) : 0;

    try {
        $sql = "INSERT INTO pontuacoes (id_usuario, pontuacao) VALUES (:id_usuario, :pontuacao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":pontuacao", $pontuacao, PDO::PARAM_INT);
        $stmt->execute();
        echo "Pontuação salva com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao salvar pontuação: " . $e->getMessage();
    }
} else {
    echo "Usuário não está logado.";
}
?>