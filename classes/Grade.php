<?php
namespace NPBreland\PHPUni;

class Grade
{
    private $student;
    public $course;
    private $int_grade;
    private $letter_grade;

    const LETTER_TO_INT = [
        'A' => 4,
        'B' => 3,
        'C' => 2,
        'D' => 1,
        'F' => 0
    ];

    public function __construct(
        Student $student,
        Course $course,
        string $letter
    )
    {
        if (!in_array($letter, array_keys(self::LETTER_TO_INT))) {
            throw new \Exception("Letter grade must be A, B, C, D, or F");
        }
        $this->student = $student;
        $this->course = $course;
        $this->setGrade($letter);
    }

    public function getIntGrade(): int
    {
        return $this->int_grade;
    }

    public function getLetterGrade(): int
    {
        return $this->int_grade;
    }

    public function getGradePointsEarned(): int
    {
        return $this->int_grade * $this->course->getNumCredits();
    }

    public function setGrade(string $letter): void
    {
        $this->letter_grade = $letter;
        $this->int_grade = self::LETTER_TO_INT[$letter];
    }
}
