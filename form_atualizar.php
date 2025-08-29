<?php
    include 'cabecalho.php';
?>
<body>
    <div class="container">
        <h2>ATUALIZACAO DE PRODUTOS</h2>
        <?php
            $id = $_GET['id'];
            //echo "Recebi ==> $id";

            require 'conexao.php';
            $sql = "SELECT * FROM produtos WHERE id = $id";
            $stmt = $pdo->query($sql);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            //print_r($produto);
            //echo $produto['nome'];
            //while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //    echo "ID: " . $produto['id'] . "<br>";
            //    echo "Nome: " . $produto['nome'] . "<br>";
            //    echo "Preço: R$" . $produto['preco'] . "<br>";
            //    echo "Estoque: " . $produto['estoque'] . "<br><br>";
            //}
        ?>
        <form action="#" method="POST">
            <div class="mb-3">
                Nome:<input value="<?php echo $produto['nome']; ?>"
                 type="text" name="produto" class="form-control">
            </div>
            <div class="mb-3">
                Preco:<input value="<?php echo $produto['preco']; ?>" type="text" name="preco" class="form-control">
            </div>
            <div class="mb-3">
                Quantidade:<input value="<?php echo $produto['quantidade']; ?>" type="text" name="quantidade" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
        </form>
    </div>


    <?php
        include 'rodape.php';
    ?>
</body>
</html>