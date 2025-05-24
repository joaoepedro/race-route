<?php

declare(strict_types=1);

use RaceRoute\Mvc\Controller\{
    Error404Controller,
    StockIndicatorsController,
    InsertProductController,
    InsertStockController,
    ProductFormController,
    ProductTableController,
    RemoveProductController,
    StockFormController,
    UpdateProductController
};

use RaceRoute\Mvc\Repository\ProductRepository;
use RaceRoute\Mvc\Repository\ServiceRepository;
use RaceRoute\Mvc\Repository\ClientRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDO('mysql:host=localhost;dbname=autocenter', 'root', '486582Jp*');
$productRepository = new ProductRepository($pdo);
$serviceRepository = new ServiceRepository($pdo);
$clientRepository = new ClientRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if(array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    if (str_contains($pathInfo, 'agendamento')) {
        $controller = new $controllerClass($serviceRepository);
    }
    else if (str_contains($pathInfo, 'cliente')){
        $controller = new $controllerClass($clientRepository);
    } else {
        $controller = new $controllerClass($productRepository);
    }
} else {
    $controller = new Error404Controller();
}

/**
 * @var Controller $controller
 */
$controller->processaRequisicao();

