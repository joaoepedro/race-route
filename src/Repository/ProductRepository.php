<?php

namespace RaceRoute\Mvc\Repository;

use PDO;
use RaceRoute\Mvc\Entity\Product;

class ProductRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM produtos';
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        },$dados);

        return $todosOsDados;
    }

    public function find(int $id): Product
    {
        $sql = 'SELECT * FROM produtos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->formarObjeto($dados);
    }

    private function formarObjeto($dados): Product
    {
        return new Product($dados['id'],
            $dados['nome'],
            $dados['referencia'],
            $dados['fornecedor'],
            $dados['categoria'],
            $dados['preco_compra'],
            $dados['preco_venda'],
            $dados['quantidade'],
            $dados['quantidadeMin']);
    }

    public function add(Product $product): bool
    {
        $validateReference = $this->validateReference($product->getReferencia());
        if ($validateReference) return false;

        $sql = 'INSERT INTO produtos (nome, referencia, fornecedor, categoria, preco_compra, preco_venda, quantidade, quantidadeMin) VALUES (?, ?, ?, ?, ?, ?, 0, 10);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$product->getNome());
        $statement->bindValue(2,$product->getReferencia());
        $statement->bindValue(3,$product->getFornecedor());
        $statement->bindValue(4,$product->getCategoria());
        $statement->bindValue(5,$product->getPrecoCompra());
        $statement->bindValue(6,$product->getPrecoVenda());

        return $statement->execute();
    }

    public function update(Product $product): bool
    {
        $sql = 'UPDATE produtos SET nome = ?, fornecedor = ?, categoria = ?, preco_compra = ?, preco_venda = ?, referencia = ? WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$product->getNome());
        $statement->bindValue(2,$product->getFornecedor());
        $statement->bindValue(3,$product->getCategoria());
        $statement->bindValue(4,$product->getPrecoCompra());
        $statement->bindValue(5,$product->getPrecoVenda());
        $statement->bindValue(6,$product->getReferencia());
        $statement->bindValue(7,$product->getId());

        return $statement->execute();
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM produtos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        return $statement->execute();
    }

    public function validateReference(string $reference): bool
    {
       $sql = 'SELECT * FROM produtos WHERE referencia = ?';
       $statement = $this->pdo->prepare($sql);
       $statement->bindValue(1, $reference);
       $statement->execute();
       $referenciaExiste = $statement->fetch(PDO::FETCH_ASSOC);

       return $referenciaExiste ? true : false;
    }

    public function addStock(string $reference, int $quantity): bool
    {
        $validateReference = $this->validateReference($reference);
        if (!$validateReference) return false;

        $currentQuantity = $this->getQuantity($reference);
        if ($currentQuantity > 0) {
            $quantity += $currentQuantity;
        }

        $sql = 'UPDATE produtos SET quantidade = ? WHERE referencia = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$quantity);
        $statement->bindValue(2,$reference);
        $statement->execute();
        return true;
    }

    public function getQuantity(string $reference): int
    {
        $sql = 'SELECT QUANTIDADE FROM produtos WHERE referencia = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1,$reference);
        $statement->execute();

        $quantity = $statement->fetch(PDO::FETCH_ASSOC);
        return $quantity['QUANTIDADE'];
    }
}