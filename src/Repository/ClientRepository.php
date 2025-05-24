<?php

namespace RaceRoute\Mvc\Repository;

use PDO;
use RaceRoute\Mvc\Entity\Client;

class ClientRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM clientes';
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($cliente){
            return $this->formarObjeto($cliente);
        },$dados);

        return $todosOsDados;
    }

    public function find(int $id): Client
    {
        $sql = 'SELECT * FROM clientes WHERE idcliente = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }

    private function formarObjeto($dados): Client
    {
        return new Client($dados['idcliente'],
            $dados['nome'],
            $dados['cpf'],
            $dados['celular'],
            $dados['cep'],
            $dados['logradouro'],
            $dados['numero'],
            $dados['bairro'],
            $dados['complemento'],
            $dados['data_nasc']);
    }

    public function add(Client $client): bool
    {
        $sql = 'INSERT INTO clientes (nome, cpf, celular, cep, logradouro, numero, bairro, complemento, data_nasc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $client->getNome());
        $statement->bindValue(2, $client->getCpf());
        $statement->bindValue(3, $client->getCelular());
        $statement->bindValue(4, $client->getCep());
        $statement->bindValue(5, $client->getLogradouro());
        $statement->bindValue(6, $client->getNumero());
        $statement->bindValue(7, $client->getBairro());
        $statement->bindValue(8, $client->getComplemento());
        $statement->bindValue(9, $client->getDataHoraFormatada());

        return $statement->execute();
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM clientes WHERE idcliente = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }

    public function update(Client $client): bool
    {
        $sql = 'UPDATE clientes SET nome = ?, cpf = ?, celular = ?, cep = ?, logradouro = ?, numero = ?, bairro = ?, complemento = ?, data_nasc = ? WHERE idcliente = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $client->getNome());
        $statement->bindValue(2, $client->getCpf());
        $statement->bindValue(3, $client->getCelular());
        $statement->bindValue(4, $client->getCep());
        $statement->bindValue(5, $client->getLogradouro());
        $statement->bindValue(6, $client->getNumero());
        $statement->bindValue(7, $client->getBairro());
        $statement->bindValue(8, $client->getComplemento());
        $statement->bindValue(9, $client->getDataHoraFormatada());
        $statement->bindValue(10, $client->getId());

        return $statement->execute();
    }
}