<?php
require_once __DIR__ . '/start-html.php';
/** @var RaceRoute\Mvc\Entity\Service[] $indicadoresAgendamento */
?>

<div class="botao-large">
    <img src="./images/icon-adicionar.png" alt="">
    <a href="/registra-agendamento" id="novo-agendamento" >Criar agendamento</a>
</div>

<div style="margin: 30px;">
    <h1 class="titulo-indicadores">Próximos agendamentos</h1>
    <div class="indicadores">
        <?php foreach ($indicadoresAgendamento as $indicador): ?>
            <div class="indicador">
                <h1 class="titulo-indicador"><?= $indicador->getDescricao() ?></h1>
                <div class="indicador-grupo-infos">
                    <img src="./images/calendario.png" alt="calendario">
                    <p><?= $indicador->getDataFormatada() ?> - <?= $indicador->getHora() ?>hrs</p>
                </div>
                <div class="indicador-grupo-infos">
                    <img src="./images/icon-user.png" alt="cliente">
                    <p><?= $indicador->getCliente() ?></p>
                </div>
                <div class="indicador-grupo-infos">
                    <img src="./images/icon-car.png" alt="carro">
                    <p><?= $indicador->getPlacaVeiculo() ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once __DIR__ . '/end-html.php';
