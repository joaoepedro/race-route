<?php
require "src/conexao-bd.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtos = $produtoRepositorio->buscarTodos();
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
        <?php foreach ($produtos as $produto) : ?>
            <tr>
                <td><?= $produto->getReferencia() ?></td>
                <td><?= $produto->getNome() ?></td>
                <td><?= $produto->getFornecedor() ?></td>
                <td><?= $produto->getPrecoCompra() ?></td>
                <td><?= $produto->getPrecoVenda() ?></td>
                <td><?= $produto->getQuantidade() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>