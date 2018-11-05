<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateDifferenceClass
 *
 * @author eugene
 * 
 * Class to check and output difference between 
 * two dates in seconds, minutes, hours, days, 
 * weeks, months, years.
 * Constructor params: string string string
 */
class DateDifferenceClass
{

    //varaibles for initial data
    private $firstDate;
    private $secondDate;
    private $scale;
    //variables for results
    private $yearDifference = 0;
    private $monthDifference = 0;
    private $weekDifference = 0;
    private $dayDifference = 0;
    private $hourDifference = 0;
    private $minuteDifference = 0;
    private $stampDifference = 0;

    public function __construct($firstDate, $secondDate, $scale)
    {
        $this->firstDate = $firstDate;
        $this->secondDate = $secondDate;
        $this->scale = $scale;

        $this->calculateDifference();
    }

    //check the which scale is chosen
    public function getDateDifference()
    {
        switch ($this->scale) {
            case "year":
                return $this->yearDifference;
            case "mon":
                return $this->monthDifference;
            case "week":
                return $this->weekDifference;
            case "day":
                return $this->dayDifference;
            case "hour":
                return $this->hourDifference;
            case "min":
                return $this->minuteDifference;
            case "sec":
                return $this->stampDifference;
        }
    }

    //calculate difference between two dates
    private function calculateDifference()
    {
        $this->stampDifference = abs(strtotime($this->firstDate) - strtotime($this->secondDate));

        //all of the calculations get whole interval represented in a given scale
        $this->yearDifference = floor($this->stampDifference / (365 * 60 * 60 * 24));
        $this->monthDifference = floor($this->stampDifference / (30.41 * 60 * 60 * 24));
        $this->weekDifference = floor($this->stampDifference / (7 * 60 * 60 * 24));
        $this->dayDifference = floor($this->stampDifference / (60 * 60 * 24));
        $this->hourDifference = floor($this->stampDifference / (60 * 60));
        $this->minuteDifference = floor($this->stampDifference / (60));

        //Slightly Different Solution: All of the calculations altogether represent same interval
        //$this->yearDifference = floor($this->stampDifference / (365*60*60*24));
        //$this->monthDifference = floor(($this->stampDifference - $this->yearDifference * 365*60*60*24) / (30*60*60*24));
        //$this->dayDifference = floor(($this->stampDifference - $this->yearDifference * 365*60*60*24 - $this->monthDifference*30*60*60*24)/ (60*60*24));
    }
}
