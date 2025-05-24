<?php
require_once __DIR__ . '/start-html.php';
?>

    <div style="height: 570px;" class="container-estoque">
        <h2 class="titulo-indicadores">Novo agendamento</h2>
        <form method="post" onsubmit="enviarSMS(event)">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" required>
            </div>

            <div class="form-group">
                <label for="prestador">Prestador</label>
                <input type="text" id="prestador" name="prestador" required>
            </div>

            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input type="text" id="cliente" name="cliente" required>
            </div>

            <div class="form-group">
                <label for="placa">Placa do Veículo</label>
                <input type="text" id="placa" name="placa" required>
            </div>

            <div class="form-group">
                <label for="contato">Contato</label>
                <input type="text" id="contato" name="contato" required>
            </div>

            <div class="form-group">
                <label for="dataHora">Data e Hora de Agendamento</label>
                <input type="datetime-local" id="dataHora" name="dataHora" required>
            </div>

            <input name="agendamento" class="botao-submit" id="agendamento" type="submit" value="Agendar">
        </form>
    </div>

<?php require_once __DIR__ . '/end-html.php';
