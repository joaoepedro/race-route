<?php
require_once __DIR__ . '/../vendor/autoload.php';

use RaceRoute\Mvc\Repository\ProductRepository;

$pdo = new PDO('mysql:host=localhost;dbname=autocenter', 'root', '486582Jp*');
$productRepository = new ProductRepository($pdo);
$products = $productRepository->findAll();
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    :root {
        --neon-green: #A7F700;
        --dark-grey: #212121;
        --light-grey: #424242;
        --red: #ac0909;
    }

    table {
        font-family: "Montserrat", sans-serif;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
    }

    thead tr {
        height: 60px;
        background-color: #A7F700;
        color: #212121;
    }

    th {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
    }

    tbody tr {
        background-color: var(--dark-grey);
        color: #FFFFFF;
    }

    td {
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
    }

    td a {
        cursor: pointer;
    }
</style>

<table>
    <thead>
    <tr>
        <th>Referência</th>
        <th>Produto</th>
        <th>Fornecedor</th>
        <th>Compra (R$)</th>
        <th>Venda (R$)</th>
        <th>Quantidade</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= $product->getReferencia() ?></td>
            <td><?= $product->getNome() ?></td>
            <td><?= $product->getFornecedor() ?></td>
            <td><?= $product->getPrecoCompra() ?></td>
            <td><?= $product->getPrecoVenda() ?></td>
            <td><?= $product->getQuantidade() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>