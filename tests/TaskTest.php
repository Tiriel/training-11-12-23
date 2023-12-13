<?php

namespace Tests;

use App\DayOfWeek;
use App\Task;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    public function testStartDateMustBeInferiorToEndDate()
    {
        $task = new Task(
            'Test task',
            new \DateTimeImmutable('01-12-2023'),
            new \DateTimeImmutable('24-12-2023'),
            DayOfWeek::Monday
        );

        $this->assertGreaterThan($task->getStart(), $task->getEnd());
    }

    public function testConstructThrowsIfStartDateIsSuperiorToEndDate()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("End date must be superior to start date");

        $task = new Task(
            'Test task',
            new \DateTimeImmutable('24-12-2023'),
            new \DateTimeImmutable('01-12-2023'),
            DayOfWeek::Monday
        );
    }

    public function testTaskSetRecurringDayConvertsString(): void
    {
        $task = new Task(
            'Test task',
            new \DateTimeImmutable('01-12-2023'),
            new \DateTimeImmutable('24-12-2023'),
            DayOfWeek::Monday
        );

        $task->setRecurringDay('tuesday');

        $this->assertInstanceOf(DayOfWeek::class, $task->getRecurringDay());
    }

    public function testTaskSetRecurringDayThrowsOnInvalidDay()
    {
        $this->expectException(\ValueError::class);

        $task = new Task(
            'Test task',
            new \DateTimeImmutable('01-12-2023'),
            new \DateTimeImmutable('24-12-2023'),
            DayOfWeek::Monday
        );

        $task->setRecurringDay('thursday');
    }
}
