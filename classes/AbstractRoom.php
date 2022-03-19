<?php

abstract class AbstractRoom
{
    private $name;
    private $capacity;
    private $building;

    public function __construct(string $name, int $capacity, Building $building)
    {
        $this->name = $name;
        $this->capacity = $capacity;
        $this->building = $building;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }
}
