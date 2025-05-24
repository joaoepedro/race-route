<?php
require_once __DIR__ . '/start-html.php';
/** @var RaceRoute\Mvc\Entity\Product[] $produtos */
?>

    <div class="botao-group">
        <div class="botao-large">
            <img src="./images/icon-adicionar.png" alt="">
            <a id="cadastra-produto" href="/cadastra-produto">Cadastrar produto</a>
        </div>

        <div class="botao-large">
            <form action="/generate-pdf.php" method="post" style="margin: 0; flex-direction: row">
                <img src="/images/icon-download.png" alt="">
                <button type="submit"> Baixar Relatório</button>
            </form>
        </div>
    </div>

    <div class="container-table">
        <table>
            <thead>
            <tr>
                <th>Referência</th>
                <th>Produto</th>
                <th>Fornecedor</th>
                <th>Compra (R$)</th>
                <th>Venda (R$)</th>
                <th>Quantidade</th>
                <th colspan="2">Editar | Excluir</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $produto->getReferencia() ?></td>
                    <td><?= $produto->getNome() ?></td>
                    <td><?= $produto->getFornecedor() ?></td>
                    <td>R$<?= $produto->getPrecoCompra() ?></td>
                    <td>R$<?= $produto->getPrecoVenda() ?></td>
                    <td><?= $produto->getQuantidade() ?></td>
                    <td>
                        <a href="./edita-produto?id=<?= $produto->getId(); ?>">
                            <img src="./images/icon-editar.png" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="./remove-produto?id=<?= $produto->getId(); ?>">
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