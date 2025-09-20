<?php
require 'conexao.php';

$nome = $_POST['produto'];
$preco = $_POST['preco'];
$estoque = $_POST['quantidade'];

$sql = "INSERT INTO produtos (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':quantidade', $estoque);

if ($stmt->execute()) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Produto Inserido</title>
        <link rel="stylesheet" href="style_listar.css">
    </head>
    <body>
        <div class="card">
            <h2>✅ Inserido com sucesso!</h2>
            <a href="form_cadastrar.php" class="btn">Voltar ao Cadastro</a>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Erro ao inserir produto.";
}
?>
