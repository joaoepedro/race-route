<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ProductRepository;

class RemoveProductController
{
    public function __construct(private ProductRepository $productRepository  )
    {

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            exit();
        }

        if ($this->productRepository->remove($id) === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /produto');
        }
    }
}