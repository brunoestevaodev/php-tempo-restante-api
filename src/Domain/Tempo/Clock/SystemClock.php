<?php

namespace App\Domain\Tempo\Clock;

use DateTimeImmutable;

class SystemClock implements Clock
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
