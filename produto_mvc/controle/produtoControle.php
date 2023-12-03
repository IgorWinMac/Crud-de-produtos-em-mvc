<?php

require_once('../modelo/produtoModelo.php');



class produtoControle
{

    private $produtoModelo;

    public function __construct()
    {
        $this->produtoModelo = new ProdutoModelo();
    }

    function inserirProduto($nome, $marca, $modelo, $valor, $quantidade)
    {
        try {
            $produtoModelo = $this->produtoModelo->inserirProduto($nome, $marca, $modelo, $valor, $quantidade);

            return $produtoModelo;
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }


    function getAllProdutoModelo($pesquisar)
    {
        try {
            $produtoModelo = $this->produtoModelo->getAll($pesquisar);

            return $produtoModelo;
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }


    function getOneProdutoModelo($id)
    {
        try {
            $produtoModelo = $this->produtoModelo->getOneProdutoModelo($id);

            return $user;
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    function editarProdutoModelo($id, $nome, $marca, $modelo, $valor, $quantidade)
    {
        try {
            $produtoModelo = $this->produtoModelo->editarProdutoModelo($id, $nome, $marca, $modelo, $valor, $quantidade);

            return $produtoModelo;
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }


    function excluirProdutoModelo($id)
    {
        try {
            $produtoModelo = $this->produtoModelo->excluirProdutoModelo($id);

            return $produtoModelo;
        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}
