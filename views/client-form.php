<?php
require_once __DIR__ . '/../views/start-html.php';
/* @var RaceRoute\Mvc\Entity\Client $client */
?>

    <div class="container-cadastro">
        <h2 class="titulo-indicadores">Cadastro de Cliente</h2>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" id="nome" name="nome" required value="<?= $client?->getNome(); ?>">
            </div>

            <div class="form-group-line">
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input class="input-client" type="text" id="cpf" name="cpf" required value="<?= $client?->getCpf(); ?>">
                </div>

                <div class="form-group">
                    <label for="dataNasc">Data de Nascimento</label>
                    <input type="date" id="dataNasc" name="dataNasc" required>
                </div>
            </div>

            <div class="form-group-line">
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input class="input-client" type="text" id="celular" name="celular" required value="<?= $client?->getCelular(); ?>">
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" required value="<?= $client?->getCep(); ?>" maxlength="9">
                </div>
            </div>

            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input type="text" id="logradouro" name="logradouro" required value="<?= $client?->getLogradouro(); ?>">
            </div>

            <div class="form-group-line">
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input class="input-client-bairro" type="text" id="bairro" name="bairro" required value="<?= $client?->getBairro(); ?>">
                </div>

                <div class="form-group-small">
                    <label for="numero">Número</label>
                    <input type="number" id="numero" name="numero" step="0.01" required value="<?= $client?->getNumero(); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" id="complemento" name="complemento" value="<?= $client?->getComplemento(); ?>">
            </div>

            <input class="botao-submit" id="cadastraCliente" type="submit" value="Enviar">
        </form>
    </div>

<?php require_once __DIR__ . '/../views/end-html.php'; ?>