<?php

namespace App\Domain\Tempo\ValueObject;

use DateTimeImmutable;
use Exception;
use InvalidArgumentException;

final class DataFutura
{
    private DateTimeImmutable $data;

    public function __construct(string $data)
    {
        try {
            $this->data = new DateTimeImmutable($data);
        } catch (Exception) {
            throw new InvalidArgumentException('Data inválida');
        }
    }

    public function value(): DateTimeImmutable
    {
        return $this->data;
    }
}
