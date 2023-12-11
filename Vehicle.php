<?php

abstract class Vehicle
{
    public function __construct(
        protected readonly string $make,
        protected ?string $model = null,
        protected ?VehicleType $type = VehicleType::Vehicle,
    ) {
    }

    public function start(): string
    {
        if (null === $this->model || VehicleType::Vehicle === $this->type) {
            throw new \InvalidArgumentException();
        }

        return $this->doStart();
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    abstract public function doStart(): string;
}
