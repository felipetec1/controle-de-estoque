<?php
include('db.php');

$id = $_GET['id'];

// Excluir o produto do banco de dados
$sql = "DELETE FROM produtos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto excluído com sucesso!";
    header('Location: index.php'); // Redireciona de volta para a página principal
    exit;
} else {
    echo "Erro ao excluir produto: " . $conn->error;
}

