<?php
namespace NPBreland\PHPUni;

abstract class AbstractPerson
{
    protected $first_name;
    protected $last_name;
    protected $date_of_birth;
    protected $id;

    public function __construct(
        string $first_name,
        string $last_name,
        \DateTime $date_of_birth,
        int $id
    )
    {
        $this->first_name       = $first_name;
        $this->last_name        = $last_name;
        $this->date_of_birth    = $date_of_birth;
        $this->id               = $id;
    }

    public function getAge(): int
    {
        $now = new \DateTime();
        return $this->date_of_birth->diff($now)->y;
    }

    public function getNameLastFirst(): string
    {
        return "$this->last_name, $this->first_name";
    }

    public function getDateOfBirth(): string
    {
        return $this->date_of_birth->format('d/m/Y');
    }

    abstract protected function printSchedule(): void;
    abstract protected function printProfile(): void;
}
