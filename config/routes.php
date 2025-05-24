<?php

return [
    'GET|/' => \RaceRoute\Mvc\Controller\StockIndicatorsController::class,
    'GET|/produto' => \RaceRoute\Mvc\Controller\ProductTableController::class,
    'GET|/cadastra-produto' => \RaceRoute\Mvc\Controller\ProductFormController::class,
    'POST|/cadastra-produto' => \RaceRoute\Mvc\Controller\InsertProductController::class,
    'GET|/edita-produto' => \RaceRoute\Mvc\Controller\ProductFormController::class,
    'POST|/edita-produto' => \RaceRoute\Mvc\Controller\UpdateProductController::class,
    'GET|/remove-produto' => \RaceRoute\Mvc\Controller\RemoveProductController::class,
    'GET|/registra-estoque' => \RaceRoute\Mvc\Controller\StockFormController::class,
    'POST|/registra-estoque' => \RaceRoute\Mvc\Controller\InsertStockController::class,
    'GET|/agendamentos' => \RaceRoute\Mvc\Controller\ScheduleController::class,
    'GET|/registra-agendamento' => \RaceRoute\Mvc\Controller\ServiceFormController::class,
    'POST|/registra-agendamento' => \RaceRoute\Mvc\Controller\InsertServiceController::class,
    'GET|/cliente' => \RaceRoute\Mvc\Controller\ClientTableController::class,
    'GET|/cadastra-cliente' => \RaceRoute\Mvc\Controller\ClientFormController::class,
    'POST|/cadastra-cliente' => \RaceRoute\Mvc\Controller\InsertClientController::class,
    'GET|/edita-cliente' => \RaceRoute\Mvc\Controller\ClientFormController::class,
    'POST|/edita-cliente' => \RaceRoute\Mvc\Controller\UpdateClientController::class,
    'GET|/remove-cliente' => \RaceRoute\Mvc\Controller\RemoveClientController::class,
];