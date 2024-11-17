<?php
require "src/conexao-bd.php";
require "src/Modelo/Servico.php";
require "src/Repositorio/ServicoRepositorio.php";

$servicoRepositorio = new ServicoRepositorio($pdo);
$indicadoresAgendamento = $servicoRepositorio->indicadorAgendamentos();
?>

<div class="botao-large">
    <img src="./images/icon-adicionar.png" alt="">
    <a id="novo-agendamento" onclick="loadContent('novo-agendamento', './cadastra-servico.php')">Criar agendamento</a>
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