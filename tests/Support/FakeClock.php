<?php

namespace Tests\Support;

use App\Domain\Tempo\Clock\Clock;
use DateTimeImmutable;

final class FakeClock implements Clock
{
    public function __construct(
        private DateTimeImmutable $now
    ) {}

    public function now(): DateTimeImmutable
    {
        return $this->now;
    }
}
