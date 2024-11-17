<?php

class ProdutoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array
    {
        $sql = 'SELECT * FROM produtos';
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }

    public function buscar(int $id)
    {
        $sql = 'SELECT * FROM produtos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['nome'],
            $dados['referencia'],
            $dados['fornecedor'],
            $dados['categoria'],
            $dados['preco_compra'],
            $dados['preco_venda'],
            $dados['quantidade'],
            $dados['quantidadeMin']);
    }

    public function salvar(Produto $produto)
    {
        //$sql = 'SELECT * FROM produtos WHERE referencia = ?';

        $sql = 'INSERT INTO produtos (nome, referencia, fornecedor, categoria, preco_compra, preco_venda, quantidade, quantidadeMin) VALUES (?, ?, ?, ?, ?, ?, 0, 0);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$produto->getNome());
        $statement->bindValue(2,$produto->getReferencia());
        $statement->bindValue(3,$produto->getFornecedor());
        $statement->bindValue(4,$produto->getCategoria());
        $statement->bindValue(5,$produto->getPrecoCompra());
        $statement->bindValue(6,$produto->getPrecoVenda());
        $statement->execute();
    }

    public function atualizar(Produto $produto)
    {
        $sql = 'UPDATE produtos SET nome = ?, fornecedor = ?, categoria = ?, preco_compra = ?, preco_venda = ?, referencia = ? WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$produto->getNome());
        $statement->bindValue(2,$produto->getFornecedor());
        $statement->bindValue(3,$produto->getCategoria());
        $statement->bindValue(4,$produto->getPrecoCompra());
        $statement->bindValue(5,$produto->getPrecoVenda());
        $statement->bindValue(6,$produto->getReferencia());
        $statement->bindValue(7,$produto->getId());
        $statement->execute();
    }

    public function deletar(int $id)
    {
        $sql = 'DELETE FROM produtos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();
    }

    public function registraEstoque(string $referencia, int $quantidade)
    {
        $validacaoReferencia = $this->validaReferencia($referencia);
        if (!$validacaoReferencia) return false;

        $quantidadeAtual = $this->buscaQuantidade($referencia);
        if ($quantidadeAtual > 0) {
            $quantidade += $quantidadeAtual;
        }

        $sql = 'UPDATE produtos SET quantidade = ? WHERE referencia = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$quantidade);
        $statement->bindValue(2,$referencia);
        $statement->execute();
    }

    public function buscaQuantidade(string $referencia): int
    {
        $sql = 'SELECT QUANTIDADE FROM produtos WHERE referencia = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$referencia);
        $statement->execute();

        $quantidade = $statement->fetch(PDO::FETCH_ASSOC);
        return $quantidade['QUANTIDADE'];
    }

    public function validaReferencia(string $referencia): bool
    {
        $sql = 'SELECT * FROM produtos WHERE referencia = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$referencia);
        $statement->execute();
        $referenciaExiste = $statement->fetch(PDO::FETCH_ASSOC);

        return $referenciaExiste ? true : false;
    }

    public function indicadorEstoqueMinimo(): array
    {
        $sql = 'SELECT * FROM produtos WHERE quantidade < quantidadeMin';
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }

}