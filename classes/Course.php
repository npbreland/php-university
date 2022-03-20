<?php

class Course
{
    public $code;
    private $name;
    private $department;
    private $num_credits;
    private $prereqs;

    public function __construct(
        string $code,
        string $name,
        AcademicDepartment $department,
        int $num_credits,
        array $prereqs = []
    )
    {
        $this->code = $code;
        $this->name = $name;
        $this->department = $department;
        $this->num_credits = $num_credits;
        $this->prereqs = $prereqs;
    }

    public function getNumCredits(): int
    {
        return $this->num_credits;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCourseListing(): string
    {
        return "$this->code | $this->name" . PHP_EOL;
    }
}
