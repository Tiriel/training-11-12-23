<?php

namespace App;

class Task
{
    public function __construct(
        private readonly string $name,
        private readonly \DateTimeImmutable $start,
        private readonly \DateTimeImmutable $end,
        private DayOfWeek $recurringDay,
    ) {
        if ($this->start > $this->end) {
            throw new \InvalidArgumentException("End date must be superior to start date");
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStart(): \DateTimeImmutable
    {
        return $this->start;
    }

    public function getEnd(): \DateTimeImmutable
    {
        return $this->end;
    }

    public function getRecurringDay(): DayOfWeek
    {
        return $this->recurringDay;
    }

    public function setRecurringDay(string|DayOfWeek $recurringDay): void
    {
        if (is_string($recurringDay)) {
            $recurringDay = DayOfWeek::from($recurringDay);
        }
        $this->recurringDay = $recurringDay;
    }
}
