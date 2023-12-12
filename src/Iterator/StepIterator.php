<?php

namespace App\Iterator;

class StepIterator implements \Iterator, \Countable
{
    protected readonly int $step;
    protected int $pos = 0;
    protected readonly array $keys;
    protected readonly array $values;
    protected readonly int $total;

    public function __construct(array $data, int $step)
    {
        $this->step = $step;
        $this->keys = \array_keys($data);
        $this->values = \array_values($data);
        $this->total = \count($data);
    }

    public function current(): mixed
    {
        return $this->values[$this->pos];
    }

    public function next(): void
    {
        $this->pos += $this->step;
    }

    public function key(): mixed
    {
        return $this->keys[$this->pos];
    }

    public function valid(): bool
    {
        return $this->pos < $this->total;
    }

    public function rewind(): void
    {
        $this->pos = 0;
    }

    public function toGenerator(): iterable
    {
        for($i = 0; $i < $this->total; $i += $this->step) {
            yield $this->keys[$i] => $this->values[$i];
        }
    }

    public function count(): int
    {
        return $this->total;
    }
}
