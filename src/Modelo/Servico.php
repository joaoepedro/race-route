<?php

class Servico
{
    private ?int $id;
    private string $descricao;
    private string $prestador;
    private string $cliente;
    private string $placa_veiculo;
    private ?string $referencia;
    private \DateTime $data_hora;


    public function __construct(?int $id, string $descricao, string $prestador, string $cliente, string $placa_veiculo, ?string $referencia, string $data_hora)
    {
        $this->id = $id;
        $this->descricao = $descricao;
        $this->prestador = $prestador;
        $this->cliente = $cliente;
        $this->placa_veiculo = $placa_veiculo;
        $this->referencia = $referencia;
        $this->data_hora = new \DateTime(str_replace('T', ' ', $data_hora));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPrestador(): string
    {
        return $this->prestador;
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getPlacaVeiculo(): string
    {
        return $this->placa_veiculo;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function getDataHora(): \DateTime
    {
        return $this->data_hora;
    }

    public function getDataHoraFormatada(): string
    {
        return $this->data_hora->format('Y-m-d H:i:s');
    }

    public function getHora(): string
    {
        return $this->data_hora->format('H:i');
    }

    public function getDataFormatada(): string
    {
        $mes = $this->data_hora->format('M');
        $dia = $this->data_hora->format('d');
        return strtoupper($mes) . ', ' . $dia;
    }
}