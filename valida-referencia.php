<?php
require "src/conexao-bd.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);

if (isset($_GET['referencia'])) {
    $referencia = $_GET['referencia'];

    $existe = $produtoRepositorio->validaReferencia($referencia);

    echo json_encode(["existe" => $existe]);
}

