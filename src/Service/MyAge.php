<?php

namespace App\Service;

class MyAge
{
    /**
     * return my own age, usefull for the index page
     */
    public function getMyAge()
    {
        $today = new \DateTime();
        $myBirthdate = new \DateTime('1991-03-06');
        $completeDateAge = $myBirthdate->diff($today);
        $stringYearAge = $completeDateAge->format('%Y');

        return $stringYearAge;
    }
}