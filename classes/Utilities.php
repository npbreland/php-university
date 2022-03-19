<?php

class Utilities 
{
    public static function getCurrentTerm(): Term
    {
        $now = new DateTime();
        $year = $now->format("Y");

        $term1_start = new DateTime("$year-01-01");
        $term2_start = new DateTime("$year-06-01");
        $term3_start = new DateTime("$year-09-01");

        $term_num = null;

        if ($now >= $term1_start) {
            $term_num = 1;
        }

        if ($now >= $term2_start) {
            $term_num = 2;
        }

        if ($now >= $term3_start) {
            $term_num = 3;
        }
        
        return new Term($year, $term_num);
    }
}
