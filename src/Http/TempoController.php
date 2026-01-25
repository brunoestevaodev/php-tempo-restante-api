<?php

namespace App\Http;

use App\Domain\Tempo\Service\CalculadoraTempoRestante;
use App\Domain\Tempo\ValueObject\DataFutura;

class TempoController
{
    public function __construct(
        private CalculadoraTempoRestante $service
    ) {}

    public function index(string $dataUser): void
    {
        try {
            $data = new DataFutura($dataUser);
            $resultado = $this->service->calcular($data);

            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode(
                $resultado->toArray(),
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            );
        }catch (\InvalidArgumentException | \DomainException $e) {
            http_response_code(400);
            echo json_encode(['erro' => $e->getMessage()]);
        } catch (\Throwable $e) {
            http_response_code(500);
            echo json_encode(['erro' => 'Erro interno']);
        }
    }
}
