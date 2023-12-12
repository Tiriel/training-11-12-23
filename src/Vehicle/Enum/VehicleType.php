<?php

namespace App\Vehicle\Enum;
enum VehicleType: string
{
    case Vehicle = 'vehicle';
    case Car = 'car';
    case Motorcycle = 'motorcycle';

    public function getName(): string
    {
        return match ($this) {
            self::Vehicle => 'vehicle',
            self::Car => 'car',
            self::Motorcycle => 'motorcycle',
        };
    }
}
