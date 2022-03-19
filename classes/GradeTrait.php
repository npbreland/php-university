<?php

trait GradeCalculatorTrait
{
    public function getTotalCredits(array $courses): int
    {
        return array_reduce($courses, function($acc, $course) {
            $acc += $course->getNumCredits();
            return $acc;
        }, 0);
    }

    public function getTotalPossibleGradePoints(array $courses): int
    {
        return $this->getTotalCredits($courses) * 4;
    }

    public function getTotalGradePointsEarned(array $course_grades): int
    {
        return array_reduce($course_grades, function($acc, $grade) {
            $acc += $grade->getGradePointsEarned();
            return $acc;
        }, 0);
    }

    public function getGradePointAverage(array $courses, array $course_grades): float
    {
        $gp_earned = $this->getTotalGradePointsEarned($course_grades);
        $gp_possible = $this->getTotalPossibleGradePoints($courses);
        return ($gp_earned / $gp_possible) * 4;
    }

}
