<?php
include('db.php');

// Buscar produtos do banco de dados
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
</head>
<body>
<body bgcolor="FFD700"><h1>ESTOQUE DE PRODUTOS</h1>
    <a href="add_product.php">Adicionar Produto</a> |
    <a href="search_product.php">Consultar Produto</a>
    <a href='delete_quantity.php?id=" . $row['id'] . "'>Remover Quantidade</a>
    </table>
</body>
</html>
