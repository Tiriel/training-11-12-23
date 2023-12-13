<?php

namespace App\Vehicle;

use App\Vehicle\Enum\VehicleType;

class Car extends Vehicle
{
    public function __construct(
        string $make,
        ?string $model = null,
        array $wheels = [],
        ?VehicleType $type = VehicleType::Car
    ) {
        parent::__construct($make, $model, $type);
    }

    public function doStart(): string
    {
        return sprintf('Vroum! The %s %s %s starts', $this->make, $this->model, $this->type->getName());
    }
}

