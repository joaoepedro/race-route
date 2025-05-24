<?php
require_once __DIR__ . '/../views/start-html.php';
/* @var RaceRoute\Mvc\Entity\Product $product */
?>

    <div class="container-cadastro">
        <h2 class="titulo-indicadores">Cadastro de Produtos</h2>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" required value="<?= $product?->getNome(); ?>">
            </div>

            <div class="form-group">
                <label for="referencia">Referência</label>
                <input type="text" id="referencia" name="referencia" required value="<?= $product?->getReferencia(); ?>" onchange="verificaReferencia('cadastraProduto')">
                <p id="aviso-referencia" style="display: none;">A referência já existe no sistema.</p>
            </div>

            <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <input type="text" id="fornecedor" name="fornecedor" required value="<?= $product?->getFornecedor(); ?>">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" required>
                    <option selected><?= $product?->getCategoria(); ?></option>
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
                <input type="number" id="preco_compra" name="preco_compra" step="0.01" required value="<?= $product?->getPrecoCompra(); ?>">
            </div>

            <div class="form-group">
                <label for="preco_venda">Preço de Venda (R$)</label>
                <input type="number" id="preco_venda" name="preco_venda" step="0.01" required value="<?= $product?->getPrecoVenda(); ?>">
            </div>

            <input class="botao-submit" id="cadastraProduto" type="submit" value="Enviar">
        </form>
    </div>
<?php require_once __DIR__ . '/../views/end-html.php';