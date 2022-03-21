<?php

class Room extends AbstractRoom
{
    public function __construct(string $name, int $capacity, Building $building)
    {
        parent::__construct($name, $capacity, $building);
    }
}
