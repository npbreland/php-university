<?php

class AcademicYear
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }
}
