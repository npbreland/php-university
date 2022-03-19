<?php

class AcademicYear
{
    private $student;
    private $is_current;

    private $courses = [];
    private $grades = [];

    use GradeCalculatorTrait;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function hasGrade(Course $course)
    {
        $graded_courses = array_column($this->grades, 'course');
        $codes = array_column($graded_courses, 'code');
        return array_search($course->code, $codes);
    }

    public function setGrade(Course $course, string $letter): void
    {
        if ($i = $this->hasGrade($course)) {
            $this->grades[$i]->getGrade($letter);
        } else {
            $this->grades[] = new Grade($this, $course, $letter);
        }
    }

    public function getTotalCredits(): int
    {
        return array_reduce($this->courses, function($acc, $course) {
            $acc += $course->getNumCredits();
            return $acc;
        }, 0);
    }

    protected function getTotalPossibleGradePoints(): int
    {
        return $this->getTotalCredits() * 4;
    }

    protected function getTotalGradePointsEarned(): int
    {
        return array_reduce($this->grades, function($acc, $grade) {
            $acc += $grade->getGradePointsEarned();
            return $acc;
        }, 0);
    }

    public function getGradePointAverage(): float
    {
        $gp_earned = $this->getTotalGradePointsEarned();
        $gp_possible = $this->getTotalPossibleGradePoints();
        return ($gp_earned / $gp_possible) * 4;
    }
}
