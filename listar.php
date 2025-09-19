<?php
include "cabecalho.php";
require 'conexao.php';
?>

<div class="container">

    <?php if (isset($_GET['created'])): ?>
        <div class="alert alert-success">Produto cadastrado com sucesso.</div>
    <?php endif; ?>
    <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-success">Produto atualizado com sucesso.</div>
    <?php endif; ?>
    <?php if (isset($_GET['deleted'])): ?>
        <div class="alert alert-success">Produto apagado com sucesso.</div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">PREÇO</th>
                <th scope="col">QUANTIDADE</th>
                <th scope="col">OPÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM produtos ORDER BY id ASC";
            $stmt = $pdo->query($sql);
            while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($produto['id']) . "</td>";
                echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
                echo "<td>R$ " . number_format($produto['preco'], 2, ',', '.') . "</td>";
                echo "<td>" . htmlspecialchars($produto['quantidade']) . "</td>";
                echo "<td>
                        <div class='btn-group' role='group'>
                            <a href='form_atualizado.php?id=" . urlencode($produto['id']) . "' class='btn btn-success'>Atualizar</a>
                            <a href='apagar.php?id=" . urlencode($produto['id']) . "' class='btn btn-danger' onclick=\"return confirm('Deseja realmente apagar este produto?');\">Apagar</a>
                        </div>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
</div>

    <?php
        include 'rodape.php';
    ?>
    <link rel="stylesheet" href="style_listagem.css">
</body>
</html>