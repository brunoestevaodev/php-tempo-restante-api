<?php

namespace App\Domain\Tempo\Service;

use App\Domain\Tempo\Clock\Clock;
use App\Domain\Tempo\DTO\TempoRestanteDTO;
use App\Domain\Tempo\ValueObject\DataFutura;

final class CalculadoraTempoRestante
{
    public function __construct(
        private Clock $clock
    ) {}

    public function calcular(DataFutura $dataFutura): TempoRestanteDTO
    {
        $agora = $this->clock->now();
        $futura = $dataFutura->value();

        if ($futura < $agora) {
            throw new \DomainException('A data informada é menor que a data atual');
        }

        $diff = $agora->diff($futura);

        return new TempoRestanteDTO(
            $diff->y,
            $diff->m,
            $diff->d,
            $diff->h,
            $diff->i
        );
    }
}
