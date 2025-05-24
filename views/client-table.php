<?php
require_once __DIR__ . '/start-html.php';
/** @var RaceRoute\Mvc\Entity\Client[] $clients */
?>

    <div class="botao-group">
        <div class="botao-large">
            <img src="./images/icon-adicionar.png" alt="">
            <a id="cadastra-produto" href="/cadastra-cliente">Cadastrar cliente</a>
        </div>
    </div>

    <div class="container-table">
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Aniversário</th>
                <th >Editar</th>
                <th >Excluir</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clients as $client) : ?>
                <tr>
                    <td><?= $client->getNome() ?></td>
                    <td><?= $client->getCelular() ?></td>
                    <td><?= $client->getDataFormatada() ?></td>
                    <td>
                        <a href="./edita-cliente?id=<?= $client->getId(); ?>">
                            <img src="./images/icon-editar.png" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="./remove-cliente?id=<?= $client->getId(); ?>">
                            <img src="./images/icon-lixeira.png" alt="">
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<?php
require_once __DIR__ . '/end-html.php';