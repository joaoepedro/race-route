<?php

namespace RaceRoute\Mvc\Repository;

use PDO;
use RaceRoute\Mvc\Entity\Service;

class ServiceRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function register(Service $servico): bool
    {
        $sql = 'INSERT INTO servicos (descricao, prestador, cliente, placa_veiculo, contato, dataHora) VALUES (?, ?, ?, ?, ?, ?);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$servico->getDescricao());
        $statement->bindValue(2,$servico->getPrestador());
        $statement->bindValue(3,$servico->getCliente());
        $statement->bindValue(4,$servico->getPlacaVeiculo());
        $statement->bindValue(5,$servico->getcontato());
        $statement->bindValue(6,$servico->getDataHoraFormatada());
        return $statement->execute();
    }

    private function formarObjeto($dados)
    {
        return new Service($dados['id'],
            $dados['descricao'],
            $dados['prestador'],
            $dados['cliente'],
            $dados['placa_veiculo'],
            $dados['contato'],
            $dados['dataHora']);
    }

    public function indicadorAgendamentos(): array
    {
        $dataAtual = date('Y-m-d');
        $sql = 'SELECT * FROM servicos WHERE DATE(dataHora) >= ? ORDER BY dataHora;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $dataAtual);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($servico){
            return $this->formarObjeto($servico);
        },$dados);

        return $todosOsDados;
    }
}