<?php

require_once('../controle/produtoControle.php');

$errorMessage = null;

if (isset($_POST) && isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $valor = $_POST['valor'];
    $quantidade = $_POST['quantidade'];

    $produtoControle = new produtoControle();

    $resultado = $produtoControle->inserirProduto($nome, $marca, $modelo, $valor, $quantidade);

    if (!$resultado['success']) {
        $errorMessage = $resultado['message'];
    } else {
        header("location: listarProduto.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produtos</title>
</head>

<body>
    <form method="post" name="produto">
        <?php if ($errorMessage !== null) ?>
        <p style="color: red;"><?php echo 'Erro no cadastro: ' . $errorMessage; ?></p>

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marcar" required>
        </div>
        <div>
            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="number" id="valor" name="valor" required>
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>
        </div>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>