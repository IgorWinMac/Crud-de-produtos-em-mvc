<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusão de Produto</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<?php

include '../controle/PodutoControle.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $produtoControle = new produtoControle();

    $linha = $produtoControle->getOneProdutoControle($id);
}
?>


<?php

$errorMessage = null;

if (isset($_POST["enviar"])) {

    $id = $_GET['id'];

    $produtoControle = new produtoControle();

    $resultado = $produtoControle->excluirProdutoControle($id);

    if (!$resultado['success']) {
        $errorMessage = $resultado['message'];
    } else {
        header("location: listarProduto.php");
    }
}
?>


<body>
    <form method="post" name="produto">
        <?php if ($errorMessage !== null) : ?>
            <p style="color: red;"><?php echo 'Erro ao excluir: ' . $errorMessage; ?></p>
        <?php endif; ?>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $linha['nome'] ?>">
        </div>
        <div>
            <label for="rg">Marca:</label>
            <input type="text" id="marca" name="marca" value="<?php echo $linha['marca'] ?>">
        </div>
        <div>
            <label for="cpf">Modelo:</label>
            <input type="text" id="modelo" name="modelo" value="<?php echo $linha['modelo'] ?>">
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor" value="<?php echo $linha['valor'] ?>">
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo $linha['quantidade'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name='enviar'>Excluir</button>
        <a href="listarProduto.php" class="btn btn-primary">Pesquisar</a>
    </form>
</body>

</html>