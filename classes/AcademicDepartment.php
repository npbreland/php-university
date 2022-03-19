<?php

class AcademicDepartment
{
    protected $name;
    protected $school;

    public function __construct(string $name, School $school)
    {
        $this->name = $name;
        $this->school = $school;
    }
}
