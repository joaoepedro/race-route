<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ServiceRepository;

class ServiceFormController
{
    public function __construct(private ServiceRepository $serviceRepository)
    {

    }

    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/service-form.php';
    }
}