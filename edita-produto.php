<?php
require "src/conexao-bd.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produto = $produtoRepositorio->buscar($_GET['id']);
?>

<div class="container-cadastro">
    <h2 class="titulo-indicadores">Cadastro de Produtos</h2>
    <form method="post">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" value="<?= $produto->getNome() ?>" required>
        </div>

        <div class="form-group">
            <label for="referencia">Referência</label>
            <input type="text" id="referencia" name="referencia" value="<?= $produto->getReferencia() ?>">
        </div>

        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <input type="text" id="fornecedor" name="fornecedor" value="<?= $produto->getFornecedor() ?>" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" required>
                <option selected><?= $produto->getCategoria() ?></option>
                <option value="acessorios-externos">Acessórios Externos</option>
                <option value="baterias">Baterias</option>
                <option value="espelhos">Espelhos</option>
                <option value="fluídos">Fluídos</option>
                <option value="freios">Freios</option>
                <option value="iluminacao">Iluminação</option>
                <option value="limpeza">Limpeza</option>
                <option value="lubrificantes">Lubrificantes</option>
                <option value="pneus">Pneus</option>
                <option value="vidros">Vidros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preco_compra">Preço de Compra (R$)</label>
            <input type="number" id="preco_compra" name="preco_compra" step="0.01" value="<?= $produto->getPrecoCompra() ?>" required>
        </div>

        <div class="form-group">
            <label for="preco_venda">Preço de Venda (R$)</label>
            <input type="number" id="preco_venda" name="preco_venda" step="0.01" value="<?= $produto->getPrecoVenda() ?>" required>
        </div>

        <input type="hidden" name="id" value="<?= $produto->getId() ?>">

        <input name="editar" class="botao-submit" type="submit" value="Editar">
    </form>
</div>