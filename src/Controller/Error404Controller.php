<?php

namespace RaceRoute\Mvc\Controller;

class Error404Controller
{
    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}