<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class StockFormController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/stock-form.php';
    }
}