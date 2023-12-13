<?php

namespace App\Vehicle;

use App\Vehicle\Enum\VehicleType;

abstract class Vehicle
{
    public function __construct(
        protected readonly string $make,
        protected ?string $model = null,
        protected array $wheels = [],
        protected ?VehicleType $type = VehicleType::Vehicle,
    ) {
    }

    public function start(): string
    {
        if (null === $this->model
            || VehicleType::Vehicle === $this->type
            || 0 !== \count($this->wheels) % 2
        ) {
            throw new \InvalidArgumentException();
        }

        return $this->doStart();
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getWheels(): array
    {
        return $this->wheels;
    }

    public function addWheel(Wheel $wheel): void
    {
        $this->wheels[] = $wheel;
    }

    public function removeWheel(Wheel $wheel): void
    {
        unset($this->wheels[array_search($wheel, $this->wheels)]);
    }

    abstract public function doStart(): string;
}
