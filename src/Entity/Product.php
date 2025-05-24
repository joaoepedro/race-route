<?php

namespace RaceRoute\Mvc\Entity;

class Product
{
    private ?int $id;
    private string $nome;
    private string $referencia;
    private string $fornecedor;
    private string $categoria;
    private string $preco_compra;
    private string $preco_venda;
    private ?int $quantidade;
    private ?int $quantidadeMin;

    public function __construct(?int $id, string $nome, string $referencia, string $fornecedor, string $categoria, string $preco_compra, string $preco_venda, ?int $quantidade, ?int $quantidadeMin)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->referencia = $referencia;
        $this->fornecedor = $fornecedor;
        $this->categoria = $categoria;
        $this->preco_compra = $preco_compra;
        $this->preco_venda = $preco_venda;
        $this->quantidade = $quantidade;
        $this->quantidadeMin = $quantidadeMin;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getReferencia(): string
    {
        return $this->referencia;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function getQuantidadeMin(): ?int
    {
        return $this->quantidadeMin;
    }

    public function getFornecedor(): string
    {
        return $this->fornecedor;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function getPrecoCompra(): string
    {
        return $this->preco_compra;
    }

    public function getPrecoVenda(): string
    {
        return $this->preco_venda;
    }

}