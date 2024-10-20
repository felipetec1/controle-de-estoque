<?php
$host = "localhost";
$user = "root"; // Nome de usuário padrão do MySQL no XAMPP
$pass = "";     // Senha vazia no XAMPP, a menos que tenha configurado uma
$dbname = "estoque_db";

// Conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

