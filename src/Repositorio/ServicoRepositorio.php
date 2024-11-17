<?php

class ServicoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function agendar(Servico $servico)
    {
        $sql = 'INSERT INTO servicos (descricao, prestador, cliente, placa_veiculo, referencia, dataHora) VALUES (?, ?, ?, ?, ?, ?);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$servico->getDescricao());
        $statement->bindValue(2,$servico->getPrestador());
        $statement->bindValue(3,$servico->getCliente());
        $statement->bindValue(4,$servico->getPlacaVeiculo());
        $statement->bindValue(5,$servico->getReferencia());
        $statement->bindValue(6,$servico->getDataHoraFormatada());
        $statement->execute();
    }

    private function formarObjeto($dados)
    {
        return new Servico($dados['id'],
            $dados['descricao'],
            $dados['prestador'],
            $dados['cliente'],
            $dados['placa_veiculo'],
            $dados['referencia'],
            $dados['dataHora']);
    }

    public function indicadorAgendamentos(): array
    {
        $dataAtual = date('Y-m-d');
        $sql = 'SELECT * FROM servicos WHERE DATE(dataHora) like ?;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $dataAtual);
        $statement->execute();
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }
}