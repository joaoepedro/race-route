<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Entity\Product;
use RaceRoute\Mvc\Repository\ProductRepository;

class InsertProductController
{
    public function __construct(private ProductRepository $productRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $referencia = filter_input(INPUT_POST, 'referencia');
        $fornecedor = filter_input(INPUT_POST, 'fornecedor');
        $categoria = filter_input(INPUT_POST, 'categoria');
        $precoCompra = filter_input(INPUT_POST, 'preco_compra', FILTER_VALIDATE_FLOAT);
        $precoVenda = filter_input(INPUT_POST, 'preco_venda', FILTER_VALIDATE_FLOAT);

        if ($nome === false || $referencia === false || $fornecedor === false || $categoria === false || $precoCompra === false || $precoVenda === false) {
            header('Location: /?sucesso=0');
            exit();
        }

        $product = new Product(null, $nome, $referencia, $fornecedor, $categoria, $precoCompra, $precoVenda, null, 10);
        $sucess = $this->productRepository->add($product);
        if ($sucess === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /produto');
        }
    }
}