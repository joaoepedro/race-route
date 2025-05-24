<?php

namespace RaceRoute\Mvc\Controller;

use RaceRoute\Mvc\Entity\Service;
use RaceRoute\Mvc\Repository\ServiceRepository;

class InsertServiceController
{
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        $descricao = filter_input(INPUT_POST, 'descricao');
        $prestador = filter_input(INPUT_POST, 'prestador');
        $cliente = filter_input(INPUT_POST, 'cliente');
        $placa = filter_input(INPUT_POST, 'placa');
        $contato = filter_input(INPUT_POST, 'contato');
        $dataHora = filter_input(INPUT_POST, 'dataHora');

        if ($descricao === false || $prestador === false || $cliente === false || $placa === false || $contato === false || $dataHora === false) {
            if ($isAjax) {
                echo json_encode(['sucesso' => false, 'mensagem' => 'Campos inválidos ou ausentes.']);
                return;
            } else {
                header('Location: /?sucesso=0');
                exit();
            }
        }

        $agendamento = new Service(null, $descricao, $prestador, $cliente, $placa, $contato, $dataHora);
        $sucess = $this->serviceRepository->register($agendamento);

        if ($isAjax) {
            echo json_encode(['sucesso' => $sucess]);
        } else {
            if ($sucess === false) {
                header('Location: /?sucesso=0');
            } else {
                header('Location: /agendamentos');
            }
        }
    }
}