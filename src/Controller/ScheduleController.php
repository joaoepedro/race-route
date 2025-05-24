<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Repository\ServiceRepository;

class ScheduleController
{
    public function __construct(private ServiceRepository $serviceRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $indicadoresAgendamento = $this->serviceRepository->indicadorAgendamentos();
        require_once __DIR__ . '/../../views/service-menu.php';
    }
}