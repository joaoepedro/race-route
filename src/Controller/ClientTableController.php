<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ClientRepository;

class ClientTableController
{
    public function __construct(private ClientRepository $clientRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $clients = $this->clientRepository->findAll();
        require_once __DIR__ . '/../../views/client-table.php';
    }
}