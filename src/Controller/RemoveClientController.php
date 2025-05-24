<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ClientRepository;

class RemoveClientController
{
    public function __construct(private ClientRepository $clientRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            exit();
        }

        if ($this->clientRepository->remove($id) === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /cliente');
        }
    }
}