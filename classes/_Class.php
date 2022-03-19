<?php

class _Class 
{
    public $class_id;
    private $course;
    private $term;
    private $instructor;
    private $room;

    private $days = [];

    private $students = [];

    public function __construct(
        int $class_id,
        Course $course,
        Term $term,
    )
    {
        $this->class_id = $class_id;
        $this->course = $course;
        $this->term = $term;
    }

    public function setInstructor(AbstractInstructor $instructor): void
    {
        $this->instructor = $instructor;
    }

    public function setDay(string $dayOfWeek)
    {

    }

    public function setRoom(AbstractRoom $room): void
    {
        $this->room = $room;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }

    public function getTerm(): Term
    {
        return $this->term;
    }

    public function getInstructor(): AbstractInstructor
    {
        return $this->instructor;
    }

    public function addStudent(Student $student): void
    {
        if (count($this->students) === $this->room->getCapacity()) {
            $msg = "Cannot add student to this class. Room is at capacity.";
            throw new Exception($msg);
        }
        $this->students[] = $student;
    }

    public function removeStudent(): void
    {

    }

}
