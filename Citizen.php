<?php

class Citizen
{
    public function __construct(
        private ?string $firstname = null,
        private ?string $lastname = null,
        private ?\DateTimeImmutable $birthday = null,
        private ?string $street = null,
        private ?string $postalCode = null,
        private ?string $city = null,
        private ?string $country = null,
    ) {
    }

    public function __call(string $name, array $arguments)
    {
        $prefix = substr($name, 0, 3);
        $property = lcfirst(substr($name, 3));

        if (!property_exists($this, $property)) {
            throw new \InvalidArgumentException();
        }

        return match ($prefix) {
            'get' => $this->$property,
            'set' => $this->$property = $arguments[0],
            default => throw new \InvalidArgumentException('Bad prefix'),
        };
    }
}
