<?php
namespace NPBreland\PHPUni;

class Term
{
    private $year;
    private $term_num;

    public function __construct(int $year, int $term_num) 
    {
        $this->year = $year;
        $this->term_num = $term_num;
    }

    public function getTermCode(): string
    {
        return $this->year . "T" . $this->term_num;
    }
}
