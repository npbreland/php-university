<?php
namespace NPBreland\PHPUni;

class Minor extends AbstractSpecialization
{
    public function __construct(
        string $name,
        AcademicDepartment $department
    )
    {
        parent::__construct($name, $department);
    }
}
