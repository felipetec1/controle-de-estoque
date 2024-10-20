<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sql = "SELECT * FROM produtos WHERE nome LIKE '%$nome%'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Produto</title>
</head>
<body>
<body bgcolor="EEE8AA"> <h1>Consultar Produto</h1>
    <form method="POST" action="search_product.php">
        Nome do Produto: <input type="text" name="nome" required><br><br>
        <button type="submit">Consultar</button>
    </form>

    <?php
    if (isset($result)) {
        if ($result->num_rows > 0) {
            echo "<h2>Resultados da Consulta</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nome'] . "</td>
                        <td>" . $row['quantidade'] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum produto encontrado.";
        }
    }
    ?>
    <a href="index.php">Voltar</a>
</body>
</html>
