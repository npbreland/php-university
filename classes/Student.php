<?php

// TODO: Make AbstractStudent parent of Grad/Undergrad
class Student extends AbstractPerson
{
    protected $first_name;
    protected $last_name;
    protected $date_of_birth;
    protected $enrolled_date;
    protected $major;

    private $attempted_classes = [];
    private $completed_classes = [];
    private $current_classes = [];

    public function __construct(
        string $first_name,
        string $last_name,
        DateTime $date_of_birth,
        int $id
    )
    {
        parent::__construct($first_name, $last_name, $date_of_birth, $id);
    }

    public function setMajor(Major $major): void
    {
        $this->major = $major;
    }

    private function hasTakenCourse(Course $course): bool
    {

    }


    private function isRegisteredForClass(_Class $class): bool
    {
        $codes = array_column($this->current_classes, 'code');
        return array_search($course->code, $codes);
    }

    private function timesAreFree(_Class $new_class): bool
    {
        foreach ($this->current_classes as $_class) {
            if ($_class->timesOverlap($new_class))  {
                return false;
            }
        }
        return true;
    }

    public function registerForClass(_Class $class): void
    {
        if ($this->hasTakenCourse($class->getCourse())) {
            throw new Exception("Student has already taken this course.");
        }
        if ($this->isRegisteredForClass($class)) {
            throw new Exception("Student is already registered for class.");
        }
        if (!$this->timesAreFree($class)) {
            throw new Exception("Times are not free.");
        }
        $this->current_classes[] = $class;
    }

    public function withdraw(_Class $class): void
    {
        $i = $this->isEnrolled($course);
        if ($i === false) {
            $name = $this->getNameLastFirst();
            $msg = "$name is not enrolled in course $course->code.";
            throw new Exception($msg);
        }
        array_splice($this->classes, $i, 1);
    }

    public function getEnrolledCourses(): string
    {
        return array_reduce($this->classes, function($str, $course) {
            $str .= $course->getCourseListing();
            return $str;
        }, '');
    }

    public function getBill(): float
    {
        return $this->getTotalCredits() * 109.8;
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
        return array_reduce($this->classes, function($acc, $class) {
            $acc += $class->getCourse()->getNumCredits();
            return $acc;
        }, 0);
    }

    private function getTotalPossibleGradePoints(): int
    {
        return $this->getTotalCredits() * 4;
    }

    private function getTotalGradePointsEarned(): int
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

    public function printSchedule(): void
    {
        print array_reduce($this->classes, function($str, $class) {
            $course_name = $class->getCourse()->getName();
            $course_code = $class->getCourse()->getCode();
            $days_time = $class->getDaysAndTimesString();
            $instructor = $class->getInstructor()->getNameLastFirst();
            $str .= "$course_name $course_code | $instructor | $days_time";
            $str .= PHP_EOL;
            return $str;
        }, '');
    }

    public function printProfile(): void
    {
        $name = $this->getNameLastFirst();
        $dob = $this->getDateOfBirth();
        $age = $this->getAge();
        $major = isset($this->major) ? $this->major->getName() : 'Undecided';

        print "$name | Student | $dob (Age $age) | Major: $major" . PHP_EOL; 
    }


    public function canGraduate(): bool
    {
        return false;
    }

}
