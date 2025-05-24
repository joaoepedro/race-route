<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();
require_once __DIR__ . '/pdf-content.php';
$html = ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4');

$dompdf->render();

$dompdf->stream();