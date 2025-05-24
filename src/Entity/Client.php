<?php

namespace RaceRoute\Mvc\Entity;

class Client
{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private string $celular;
    private string $cep;
    private string $logradouro;
    private string $numero;
    private string $bairro;
    private ?string $complemento;
    private \DateTime $data_nasc;

    public function __construct(?int $id, string $nome, string $cpf, string $celular, string $cep, string $logradouro, string $numero, string $bairro, ?string $complemento, string $data_nasc)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->celular = $celular;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->complemento = $complemento;
        $this->data_nasc = new \DateTime(substr($data_nasc, 0, 10));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getLogradouro(): string
    {
        return $this->logradouro;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function getDataNasc(): \DateTime
    {
        return $this->data_nasc;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function getDataFormatada(): string
    {
        return $this->data_nasc->format('d/m');
    }

    public function getDataHoraFormatada(): string
    {
        return $this->data_nasc->format('Y-m-d H:i:s');
    }
}
