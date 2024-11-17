<div style="height: 550px;" class="container-cadastro">
    <h2 class="titulo-indicadores">Novo agendamento</h2>
    <form method="post">
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
            <label for="dataHora">Data e Hora de Agendamento</label>
            <input type="datetime-local" id="dataHora" name="dataHora" required>
        </div>

        <input name="agendamento" class="botao-submit" id="agendamento" type="submit" value="Agendar">
    </form>
</div>