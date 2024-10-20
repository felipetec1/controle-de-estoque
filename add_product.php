<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (nome, quantidade) VALUES ('$nome', '$quantidade')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Produto adicionado com sucesso!";
        header('Location: index.php');
        exit;
    } else {
        echo "Erro ao adicionar produto: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produto</title>
</head>
<body>
<body bgcolor="FFD700"><h1>Adicionar Produto</h1>
    <form method="POST" action="add_product.php">
        Nome: <input type="text" name="nome" required><br><br>
        Quantidade: <input type="number" name="quantidade" required><br><br>
        <button type="submit">Adicionar</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
