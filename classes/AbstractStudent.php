<?php

class Student extends AbstractPerson
{
    protected $enrolled_date;
    protected $major;

    use GradeCalculatorTrait;

    public function __construct(
        string $first_name,
        string $last_name,
        DateTime $date_of_birth,
        int $student_id,
    )
    {
        $this->first_name       = $first_name;
        $this->last_name        = $last_name;
        $this->date_of_birth    = $date_of_birth;
        $this->student_id       = $student_id;
    }

    public function setMajor(Major $major): void
    {
        $this->major = $major;
    }

    public function getNameLastFirst(): string
    {
        return "$this->last_name, $this->first_name";
    }

    public function getDateOfBirth(): string
    {
        return $this->date_of_birth->format('d/m/Y');
    }

    public function getMajorDescription(): string
    {
        $name = $this->getNameLastFirst();
        if (!isset($this->major)) {
            throw new Exception("Major is not set for $name");
        }

        $majorName = $this->major->getName();
        return "$name is majoring in $majorName.";
    }

    private function getCurrentAcademicYear(): AcademicYear
    {


    }

    private function isEnrolled(_Class $class)
    {
        $codes = array_column($this->class, 'code');
        return array_search($course->code, $codes);
    }

    public function enroll(_Class $class): void
    {
        if ($this->isEnrolled($class) !== false) {
            $name = $this->getNameLastFirst();
            $msg = "$name is already enrolled in class $course->code.";
            throw new Exception($msg);
        }
        $this->courses[] = $course;
    }

    public function withdraw(Course $course): void
    {
        $i = $this->isEnrolled($course);
        if ($i === false) {
            $name = $this->getNameLastFirst();
            $msg = "$name is not enrolled in course $course->code.";
            throw new Exception($msg);
        }
        array_splice($this->courses, $i, 1);
    }

    public function getEnrolledCourses(): string
    {
        return array_reduce($this->courses, function($str, $course) {
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

    protected function printTermSchedule(Term $term): string
    {
        return array_reduce($this->courses, function($str, $course) {
            $str .= $course->getCourseListing();
            return $str;
        }, '');
    }

    protected function printThisWeekSchedule(): string
    {
    }

    public function canGraduate(): bool
    {
    }

}
