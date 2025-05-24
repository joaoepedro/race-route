<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class ProductFormController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $product = null;
        if ($id !== false && $id !== null) {
            $product = $this->productRepository->find($id);
        }

        require_once __DIR__ . '/../../views/product-form.php';
    }
}