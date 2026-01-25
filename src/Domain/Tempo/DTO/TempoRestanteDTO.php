<?php

namespace App\Domain\Tempo\DTO;

final class TempoRestanteDTO
{
    public function __construct(
        public readonly int $anos,
        public readonly int $meses,
        public readonly int $dias,
        public readonly int $horas,
        public readonly int $minutos,
    ) {}

    public function toArray(): array
    {
        return [
            'anos'    => $this->anos,
            'meses'   => $this->meses,
            'dias'    => $this->dias,
            'horas'   => $this->horas,
            'minutos' => $this->minutos,
        ];
    }
}
