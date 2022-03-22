<?php
namespace NPBreland\PHPUni;

class Room extends AbstractRoom
{
    public function __construct(string $name, int $capacity, Building $building)
    {
        parent::__construct($name, $capacity, $building);
    }
}
