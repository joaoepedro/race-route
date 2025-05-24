<?php
require_once __DIR__ . '/../vendor/autoload.php';
use RaceRoute\Mvc\Repository\ProductRepository;

$pdo = new PDO('mysql:host=localhost;dbname=autocenter', 'root', '486582Jp*');
$productRepository = new ProductRepository($pdo);

if (isset($_GET['referencia'])) {
    $referencia = $_GET['referencia'];
    $existe = $productRepository->validateReference($referencia);

    echo json_encode(["existe" => $existe]);
}