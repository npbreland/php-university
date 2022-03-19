<?php

abstract class AbstractPerson
{
    protected $first_name;
    protected $last_name;
    protected $date_of_birth;
    protected $id;

    public function __construct(
        string $first_name,
        string $last_name,
        DateTime $date_of_birth,
        int $id,
    )
    {
        $this->first_name       = $first_name;
        $this->last_name        = $last_name;
        $this->date_of_birth    = $date_of_birth;
        $this->id               = $id;
    }

    abstract protected function printTermSchedule(Term $term): string;
    abstract protected function printThisWeekSchedule(Term $term): string;
}
