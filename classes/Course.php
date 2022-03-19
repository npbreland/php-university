<?php

class Course
{
    public $code;
    private $name;
    private $department;
    private $num_credits;

    public function __construct(
        string $code,
        string $name,
        AcademicDepartment $department,
        int $num_credits
    )
    {
        $this->code = $code;
        $this->name = $name;
        $this->department = $department;
        $this->num_credits = $num_credits;
    }

    public function getNumCredits(): int
    {
        return $this->num_credits;
    }

    public function getCourseListing(): string
    {
        return "$this->code | $this->name" . PHP_EOL;
    }
}
