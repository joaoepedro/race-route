<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ClientRepository;

class ClientFormController
{
    public function __construct(private ClientRepository $clientRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $client = null;
        if ($id !== false && $id !== null) {
            $client = $this->clientRepository->find($id);
        }

        require_once __DIR__ . '/../../views/client-form.php';
    }
}