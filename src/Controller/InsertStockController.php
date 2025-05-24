<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class InsertStockController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $referencia = filter_input(INPUT_POST, 'referencia');
        $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

        if ($referencia === false || $quantidade === false) {
            header('Location: /?sucesso=0');
            exit();
        }

        if($this->productRepository->validateReference($referencia) === false){
            header('Location: /?sucesso=0');
        }

        $insertStock = $this->productRepository->addStock($referencia, $quantidade);
        if ($insertStock) {
            header('Location: /?sucesso=1');
        } else {
            header('Location: /?sucesso=0');
        }
    }
}