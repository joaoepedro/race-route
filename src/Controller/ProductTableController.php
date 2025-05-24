<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class ProductTableController
{
    public function __construct(private ProductRepository $productRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $produtos = $this->productRepository->findAll();
        require_once __DIR__ . '/../../views/product-table.php';
    }
}