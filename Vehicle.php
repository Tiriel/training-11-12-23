<?php

class Vehicle
{
    public function __construct(
        protected readonly string $make,
        protected ?string $model = null,
        protected ?VehicleType $type = VehicleType::Vehicle,
    ) {
    }

    public function start(): string
    {
        return sprintf('Vroum! The %s %s %s starts', $this->make, $this->model, $this->type->getName());
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }
}
