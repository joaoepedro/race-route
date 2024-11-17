<?php
require "src/conexao-bd.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtos = $produtoRepositorio->buscarTodos();
?>

<div class="botao-group">
    <div class="botao-large">
        <img src="./images/icon-adicionar.png" alt="">
        <a id="cadastra-produto" onclick="loadContent('cadastra-produto', './cadastra-produto.php')">Cadastrar produto</a>
    </div>

    <div class="botao-large">
        <form action="./gerador-pdf.php" method="post" style="margin: 0; flex-direction: row">
            <img src="./images/icon-download.png" alt="">
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
                        <a id="edita-produto-<?= $produto->getId() ?>" onclick="loadContent('edita-produto-<?= $produto->getId() ?>', './edita-produto.php?id=<?= $produto->getId() ?>')">
                            <img src="./images/icon-editar.png" alt="">
                        </a>
                    </td>
                    <td>
                        <form action="./excluir-produto.php" style="margin-top: 0;" method="post">
                            <input type="hidden" name="id" value="<?= $produto->getId() ?>">
                            <button type="submit" class="botao-excluir"><img src="./images/icon-lixeira.png" alt=""></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>