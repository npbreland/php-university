<?php

class ClassTime
{
    public $day_of_week;
    public $start_hour;
    public $start_minute;
    public $end_hour;
    public $end_minute;

    public function __construct(
        int $day_of_week,
        int $start_hour,
        int $start_minute,
        int $end_hour,
        int $end_minute
    )
    {
        if ($day_of_week < 1 || $day_of_week > 7) {
            $msg = "Day of week must be between 1 (Sunday) and 7 (Saturday).";
            throw new Exception($msg);
        }
        if ($start_hour < 0 || $start_hour > 23) {
            throw new Exception("Invalid start hour.");
        }
        if ($start_minute < 0 || $start_minute > 59) {
            throw new Exception("Invalid start minute.");
        }
        if ($end_hour < 0 || $end_hour > 23) {
            throw new Exception("Invalid end hour.");
        }
        if ($end_minute < 0 || $end_minute > 59) {
            throw new Exception("Invalid end minute.");
        }
        $this->day_of_week  = $day_of_week;
        $this->start_hour   = $start_hour;
        $this->start_minute = $start_minute;
        $this->end_hour     = $end_hour;
        $this->end_minute   = $end_minute;
    }

    // TODO: Not finished
    public function overlaps(ClassTime $other_time): bool
    {
        if ($this->day_of_week !== $other_time->day_of_week) {
            return false;
        }
        if ($this->start_hour > $other_time->start_hour
            && $this->end_hour > $other_time->end_hour) {
            return false;
        }
        if ($this->start_hour < $other_time->start_hour
            && $this->end_hour < $other_time->end_hour) {
            return false;
        }
        if ($this->start_minute > $other_time->start_minute
            && $this->end_minute > $other_time->end_minute) {
            return false;
        }
        if ($this->start_minute < $other_time->start_minute
            && $this->end_minute < $other_time->end_minute) {
            return false;
        }
        return true;
    }
}
