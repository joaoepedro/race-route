<?php
session_start();

include_once("conexao.php");

$nome_produto = $_POST['nome_produto'];
$referencia = $_POST['referencia'];
$preco_compra = $_POST['preco_compra'];
$preco_venda = $_POST['preco_venda'];
$fornecedor = $_POST['fornecedor'];

$sql = "insert into produtos (nome, referencia, preco_compra, preco_venda, fornecedor) values ('$nome_produto', '$referencia', '$preco_compra', '$preco_venda', '$fornecedor')";

if (mysqli_query($conexao, $sql)) {
    header('Location: ../index.php');
} else {
    echo "Erro ao inserir produto: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>