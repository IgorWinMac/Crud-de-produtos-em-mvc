<?php
require_once('../controle/produtoControle.php');

$produtoControle = new produtoControle();

if (isset($_POST['buscar'])) {
    $pesquisar = $_POST['buscar'];
    $data = $produtoControle->getAllProdutoModelo($pesquisar);
} else {
    $pesquisar = '';
    $data = $produtoControle->getAllProdutoModelo($pesquisar);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search" method="POST">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="buscar">
                <button class="btn btn-outline-success " type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_array($data)) {
                foreach ($data as $linha) {
                    $id = $linha['id'];
                    $nome = isset($linha['nome']) ? $linha['nome'] : 'N/A';
                    $marca = isset($linha['marca']) ? $linha['marca'] : 'N/A';
                    $modelo = isset($linha['modelo']) ? $linha['modelo'] : 'N/A';
                    $valor = isset($linha['valor']) ? $linha['valor'] : 'N/A';
                    $quantidade = isset($linha['quantidade']) ? $linha['quantidade'] : 'N/A';


                    echo "<tr>
                        <th scope='row'>$nome</th>
                        <td>$marca</td>
                        <td>$modelo</td>
                        <td>$valor</td>
                        <td>$quantidade</td>
                        <td><a href='editarProduto.php?id=$id' class='btn btn-success btn-sm'>EDITAR</a></td>
                        <td><a href='excluirProduto.php?id=$id' class='btn btn-danger btn-sm'>EXCLUIR</a></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum produto encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>