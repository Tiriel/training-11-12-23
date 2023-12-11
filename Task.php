<?php

class Task
{
    public function __construct(
        private readonly string $name,
        private readonly \DateTimeImmutable $start,
        private readonly \DateTimeImmutable $end,
        private DayOfWeek $recurringDay,
    ) {
    }

    /**
     * @param DayOfWeek $recurringDay
     */
    public function setRecurringDay(string|DayOfWeek $recurringDay): void
    {
        if (is_string($recurringDay)) {
            $recurringDay = DayOfWeek::tryFrom($recurringDay);
        }
        $this->recurringDay = $recurringDay;
    }
}
