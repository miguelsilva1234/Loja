<?php
    include 'cabecalho.php';
?>
<body>
    <link rel="stylesheet" href="style_cadastro.css">
    <div class="container">
        <h2>CADASTRO DE PRODUTOS</h2>
        <form action="inserir.php" method="POST">
            <div class="mb-3">
                <input type="text" name="produto" class="form-control" placeholder="Digite o nome do produto">
            </div>
            <div class="mb-3">
                <input type="text" name="preco" class="form-control" placeholder="Digite o preço do produto">
            </div>
            <div class="mb-3">
                <input type="text" name="quantidade" class="form-control" placeholder="Digite o quantidade do produto">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" type="button" class="btn btn-warning">Voltar</a>
        </form>
    </div>


    <?php
        include 'rodape.php';
    ?>
</body>
</html>