<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $quantidade_excluir = $_POST['quantidade_excluir'];

    // Buscar a quantidade atual do produto
    $sql = "SELECT quantidade FROM produtos WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantidade_atual = $row['quantidade'];

        // Verificar se a quantidade a ser removida é válida
        if ($quantidade_excluir <= $quantidade_atual) {
            $nova_quantidade = $quantidade_atual - $quantidade_excluir;

            if ($nova_quantidade > 0) {
                // Atualiza a quantidade no banco de dados
                $sql = "UPDATE produtos SET quantidade=$nova_quantidade WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "Quantidade atualizada com sucesso!";
                } else {
                    echo "Erro ao atualizar a quantidade: " . $conn->error;
                }
            } else {
                // Exclui o produto se a quantidade for zero
                $sql = "DELETE FROM produtos WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "Produto removido do estoque!";
                } else {
                    echo "Erro ao excluir o produto: " . $conn->error;
                }
            }
        } else {
            echo "Erro: Quantidade a ser removida é maior que a disponível!";
        }
    } else {
        echo "Produto não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Remover Quantidade do Produto</title>
</head>
<body>
<body bgcolor="FFD700"> <h1>Remover Quantidade do Produto</h1>
    <form method="POST" action="delete_quantity.php">
        <label for="id">ID do Produto:</label>
        <input type="number" name="id" required><br><br>
        
        <label for="quantidade_excluir">Quantidade a Remover:</label>
        <input type="number" name="quantidade_excluir" required><br><br>
        
        <button type="submit">Remover Quantidade</button>
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
