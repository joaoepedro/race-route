<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class StockIndicatorsController
{
    public function __construct(private ProductRepository $productRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $indicadoresEstoque = $this->productRepository->findAll();
        require_once __DIR__ . '/../../views/stock-indicators.php';
    }
}