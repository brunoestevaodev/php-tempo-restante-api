<?php

namespace Tests\Domain\Tempo;

use PHPUnit\Framework\TestCase;
use App\Domain\Tempo\Service\CalculadoraTempoRestante;
use App\Domain\Tempo\ValueObject\DataFutura;
use Tests\Support\FakeClock; 

final class CalculadoraTempoRestanteTest extends TestCase
{
    public function test_calcula_tempo_restante_corretamente(): void
    {
        $clock = new FakeClock(
            new \DateTimeImmutable('2024-01-01 00:00:00')
        );

        $service = new CalculadoraTempoRestante($clock);
        $dataFutura = new DataFutura('2025-01-01 00:00:00');

        $resultado = $service->calcular($dataFutura);

        $this->assertEquals(1, $resultado->anos);
    }
}
