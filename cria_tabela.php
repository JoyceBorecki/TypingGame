<?php
require_once "conexao.php";

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query_users = "CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($query_users);

    $query_pontuacoes = "CREATE TABLE IF NOT EXISTS pontuacoes (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        id_usuario INT NOT NULL,
        pontuacao INT,
        data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (id_usuario) REFERENCES users(id)
    )";
    
    $pdo->exec($query_pontuacoes);

    echo "Tabelas 'users' e 'pontuacoes' criadas com sucesso.";
} catch (PDOException $e) {
    echo "Erro ao criar as tabelas: " . $e->getMessage();
}
?>