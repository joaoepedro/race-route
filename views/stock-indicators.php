<?php
require_once __DIR__ . '/start-html.php';
/** @var RaceRoute\Mvc\Entity\Product[] $indicadoresEstoque */
?>

    <h1 class="titulo-indicadores">Produtos com quantidade mínima em estoque</h1>
    <div class="indicadores">
        <?php foreach ($indicadoresEstoque as $indicador): ?>
            <div class="indicador">
                <h1 class="titulo-indicador"><?= $indicador->getNome() ?></h1>
                <div class="indicador-quantidade">
                    <p>Estoque Mínimo: <?= $indicador->getQuantidadeMin() ?></p>
                    <p>Quantidade Atual: <?= $indicador->getQuantidade() ?></p>
                </div>
                <img src="images/icon-medidor.png" alt="">
            </div>
        <?php endforeach; ?>
    </div>


<?php require_once __DIR__ . '/end-html.php';