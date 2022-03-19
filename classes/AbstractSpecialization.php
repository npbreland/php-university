<?php

abstract class AbstractSpecialization
{
    protected $name;
    protected $department;

    public function __construct(
        string $name,
        AcademicDepartment $department
    )
    {
        $this->name = $name;
        $this->department = $department;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
