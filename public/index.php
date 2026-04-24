<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Http\TempoController;
use App\Application\Service\CalculadoraTempoRestante;
use App\Domain\Tempo\Clock\SystemClock;

// Container improvisado apenas para injetar as dependências
$container = [
    CalculadoraTempoRestante::class => new CalculadoraTempoRestante(
        new SystemClock()
    ),
];

$controller = new TempoController(
    $container[CalculadoraTempoRestante::class]
);

// Router improvisado
$uri = trim($_SERVER['REQUEST_URI'], '/');
$parts = explode('/', $uri);

// Método HTTP
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['erro' => 'Método não permitido']);
    exit;
}

// Validação da rota
if ($parts[0] !== 'tempo' || !isset($parts[1])) {
    http_response_code(404);
    echo json_encode(['erro' => 'Rota inválida']);
    exit;
}

// Extrai a data
$data = $parts[1];

// Valida formato da data
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
    http_response_code(400);
    echo json_encode(['erro' => 'Formato de data inválido']);
    exit;
}

// Chama o controller
$controller->index($data);
