<?php

class Major extends AbstractSpecialization
{
    public function __construct(
        string $name,
        AcademicDepartment $department
    )
    {
        parent::__construct($name, $department);
    }
}
