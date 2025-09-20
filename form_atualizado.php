<?php
include 'cabecalho.php';
require 'conexao.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao atualizar produto.";
    }
}

$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
    <link rel="stylesheet" href="style_atualizado.css">
    <div class="container">
        <h2>ATUALIZAÇÃO DE PRODUTOS</h2>
        <form method="POST">
            <div class="mb-3">
                Nome:<input value="<?php echo $produto['nome']; ?>" type="text" name="produto" class="form-control">
            </div>
            <div class="mb-3">
                Preço:<input value="<?php echo $produto['preco']; ?>" type="text" name="preco" class="form-control">
            </div>
            <div class="mb-3">
                Quantidade:<input value="<?php echo $produto['quantidade']; ?>" type="text" name="quantidade" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="listar.php" class="btn btn-warning">Voltar</a>
        </form>
    </div>

    <?php include 'rodape.php'; ?>
</body>
</html>
