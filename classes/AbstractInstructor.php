<?php

abstract class AbstractInstructor extends AbstractPerson
{
    protected $department;

    public function __construct(
        string $first_name,
        string $last_name,
        DateTime $date_of_birth,
        int $id,
        AcademicDepartment $department
    )
    {
        parent::__construct($first_name, $last_name, $date_of_birth, $id);
        $this->department = $department;
    }
}
