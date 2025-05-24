<?php
require_once __DIR__ . '/start-html.php';
?>

    <div class="container-estoque">
        <h2 class="titulo-indicadores">Controle de Estoque</h2>
        <form class="form-estoque" method="post">
            <div class="form-group">
                <label for="referencia">Referência</label>
                <input type="text" id="referencia" name="referencia" required onchange="verificaReferencia('registraEstoque')">
                <p id="aviso-referencia" style="display: none;">A referência não existe no sistema.</p>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" min="1" required>
            </div>

            <input type="submit" class="botao-submit" id="registraEstoque" name="registra-estoque" value="Adicionar"/>
        </form>
    </div>

<?php require_once __DIR__ . '/end-html.php';

