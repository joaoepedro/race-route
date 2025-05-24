<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Entity\Client;
use RaceRoute\Mvc\Repository\ClientRepository;

class UpdateClientController
{
    public function __construct (private ClientRepository $clientRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $nome = filter_input(INPUT_POST, 'nome');
        $cpf = filter_input(INPUT_POST, 'cpf');
        $celular = filter_input(INPUT_POST, 'celular');
        $cep = filter_input(INPUT_POST, 'cep');
        $logradouro = filter_input(INPUT_POST, 'logradouro');
        $numero = filter_input(INPUT_POST, 'numero');
        $bairro = filter_input(INPUT_POST, 'bairro');
        $complemento = filter_input(INPUT_POST, 'complemento');
        $dataNasc = filter_input(INPUT_POST, 'dataNasc');

        if ($id === false || $nome === false || $cpf === false || $celular === false || $cep === false || $logradouro === false || $numero === false || $bairro === false || $complemento === false || $dataNasc === false) {
            header('Location: /?sucesso=0');
            exit();
        }

        $client = new Client($id, $nome, $cpf, $celular, $cep, $logradouro, $numero, $bairro, $complemento, $dataNasc);
        $sucess = $this->clientRepository->update($client);
        if ($sucess === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /cliente');
        }
    }
}