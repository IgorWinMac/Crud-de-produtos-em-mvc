<?php

include_once('../conection/conexao.php');

class ProdutoModelo
{

    private $conn;

    public function __construct()
    {
        $this->conn = new Conexao();
    }

    function inserirProduto($name, $marca, $modelo, $valor, $quantidade)
    {
        try {
            $query = "INSERT INTO produto (nome, marca, modelo, valor, quantidade) VALUES ('$name', '$marca', '$modelo', '$valor', '$quantidade')";

            $conexao = $this->conn->conexaoDB();

            $result = $conexao->prepare($query);
            $success = $result->execute();
            $rowCount = $result->rowCount();


            if ($success && $rowCount > 0) {
                return ['success' => true, 'message' => 'Produto cadastrado com sucesso'];
            } else {
                return ['success' => false, 'message' => 'Falha ao tentar cadastrar o produto'];
            }
        } catch (Exception $ex) {
            throw new Exception('Erro ao inserir o produto: ' . $ex->getMessage());
        }
    }

    function getAll($pesquisar)
    {
        try {
            $query = "SELECT * FROM produto";

            if (!empty($pesquisar)) {
                $query .= " WHERE nome LIKE :pesquisar OR rg LIKE :pesquisar OR cpf LIKE :pesquisar";
            }

            $conexao = $this->conn->conexaoDB();

            $result = $conexao->prepare($query);

            if (!empty($pesquisar)) {
                $pesquisarParam = '%' . $pesquisar . '%';
                $result->bindParam(':pesquisar', $pesquisarParam, PDO::PARAM_STR);
            }

            $success = $result->execute();

            $produtos = $result->fetchAll(PDO::FETCH_ASSOC);



            if ($success) {
                return $produtos;
            } else {
                return ['success' => false, 'message' => 'Falha ao carregar os produtos'];
            }
        } catch (Exception $ex) {
            throw new Exception('Erro ao carregar o produto: ' . $ex->getMessage());
        }
    }

    function getOneProdutoModelo($id)
    {
        try {
            $query = "SELECT * FROM produto WHERE id = $id";

            $conexao = $this->conn->conexaoDB();

            $result = $conexao->prepare($query);

            $success = $result->execute();

            $produtos = $result->fetch(PDO::FETCH_ASSOC);



            if ($success) {
                return $produtos;
            } else {
                return ['success' => false, 'message' => 'Falha ao carregar os produtos'];
            }
        } catch (Exception $ex) {
            throw new Exception('Erro ao carregar o produto: ' . $ex->getMessage());
        }
    }

    function editarProdutoModelo($id, $nome, $marca, $modelo, $valor, $quantidade)
    {
        try {
            $query = "UPDATE produto SET nome='$nome', marca='$marca', rg='$modelo', modelo='$valor', quantidade='$quantidade' WHERE id = $id";

            $conexao = $this->conn->conexaoDB();

            $result = $conexao->prepare($query);

            $success = $result->execute();

            $result->fetch(PDO::FETCH_ASSOC);

            if ($success) {
                return ['success' => true, 'message' => 'Produto atualizado com sucesso'];
            } else {
                return ['success' => false, 'message' => 'Falha ao atualizar o produto'];
            }
        } catch (Exception $ex) {
            throw new Exception('Erro ao atualizar o produto: ' . $ex->getMessage());
        }
    }

    function excluirProdutoModelo($id)
    {
        try {
            $query = "DELETE FROM produto WHERE id = $id";

            $conexao = $this->conn->conexaoDB();

            $result = $conexao->prepare($query);

            $success = $result->execute();

            $result->fetch(PDO::FETCH_ASSOC);


            if ($success) {
                return ['success' => true, 'message' => 'Produto deletado com sucesso'];
            } else {
                return ['success' => false, 'message' => 'Falha ao deletar o produto'];
            }
        } catch (Exception $ex) {
            throw new Exception('Erro ao deletar o produto: ' . $ex->getMessage());
        }
    }
}
