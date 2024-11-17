<?php
require "src/conexao-bd.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";
require "src/Modelo/Servico.php";
require "src/Repositorio/ServicoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$servicoRepositorio = new ServicoRepositorio($pdo);

$indicadoresEstoque = $produtoRepositorio->indicadorEstoqueMinimo();
$indicadoresAgendamento = $servicoRepositorio->indicadorAgendamentos();

if (isset($_POST['cadastro'])) {
    $produto = new Produto(
        null,
        $_POST["nome"],
        $_POST["referencia"],
        $_POST["fornecedor"],
        $_POST["categoria"],
        $_POST["preco_compra"],
        $_POST["preco_venda"],
        null,
        null
    );

    $produtoRepositorio = new ProdutoRepositorio($pdo);
    $produtoRepositorio->salvar($produto);

    header("location: index.php");
}

if (isset($_POST['registra-estoque'])) {
    $produtoRepositorio = new ProdutoRepositorio($pdo);
    $produtoRepositorio->registraEstoque($_POST['referencia'], $_POST['quantidade']);

    header("Location: index.php");
}

if (isset($_POST['agendamento'])) {
    $servico = new Servico(
        null,
        $_POST["descricao"],
        $_POST["prestador"],
        $_POST["cliente"],
        $_POST["placa"],
        $_POST["referencia"],
        $_POST["dataHora"]
    );

    $servicoRepositorio = new ServicoRepositorio($pdo);
    $servicoRepositorio->agendar($servico);

    header("location: index.php");
};

if (isset($_POST['editar'])) {
    $produto = new Produto(
        $_POST["id"],
        $_POST["nome"],
        $_POST["referencia"],
        $_POST["fornecedor"],
        $_POST["categoria"],
        $_POST["preco_compra"],
        $_POST["preco_venda"],
        null,
        null
    );

    $produtoRepositorio->atualizar($produto);
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Route</title>
    <link rel="stylesheet" href="./src/styles/reset.css">
    <link rel="stylesheet" href="./src/styles/global.css">
    <link rel="stylesheet" href="./src/styles/consulta.css">
    <link rel="stylesheet" href="./src/styles/controle-estoque.css">
    <link rel="stylesheet" href="./src/styles/cadastro-produto.css">
</head>

<body>
    <div class="sidebar">
        <a href="index.php" style="padding: 0;"><img src="./images/logo-lettering.jpg"></a>
        <a id="produtos-link">Produtos</a>
        <a id="estoque-link">Estoque</a>
        <a id="agendamentos">Agendamentos</a>
    </div>

    <section>
        <div class="nav">
            <div class="botao-logout">
                <img src="./images/icon-logout.png" alt="icone logout">
                <a href="">Logout</a>
            </div>
        </div>
        <div class="content" id="content">
            <h1 class="titulo-indicadores">Produtos com quantidade mínima em estoque</h1>
            <div class="indicadores">
                <?php foreach ($indicadoresEstoque as $indicador): ?>
                    <div class="indicador">
                        <h1 class="titulo-indicador"><?= $indicador->getNome() ?></h1>
                        <div class="indicador-quantidade">
                            <p>Estoque Mínimo: <?= $indicador->getQuantidadeMin() ?></p>
                            <p>Quantidade Atual: <?= $indicador->getQuantidade() ?></p>
                        </div>
                        <img src="./images/icon-medidor.png" alt="">
                    </div>
                <?php endforeach; ?>
            </div>

            <h1 class="titulo-indicadores">Agendamentos para hoje</h1>
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
    </section>

    <script src="functions.js"></script>
    <script>
        // Adiciona os event listeners para os links
        loadContent('produtos-link', './consulta.php');
        loadContent('estoque-link', './controle-estoque.php');
        loadContent('agendamentos', './agendamentos.php');
    </script>

</body>

</html>