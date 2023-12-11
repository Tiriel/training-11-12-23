<?php

class Car extends Vehicle
{
    public function __construct(
        string $make,
        ?string $model = null,
        ?VehicleType $type = VehicleType::Car
    ) {
        parent::__construct($make, $model, $type);
    }
}

