<?php

class AbstractInstructor
{
    protected $first_name;
    protected $last_name;
    protected $date_of_birth;
    protected $department;

    public function __construct(
        string $first_name,
        string $last_name,
        DateTime $date_of_birth,
        AcademicDepartment $department
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
        $this->department = $department;
    }
}
