<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PluralFormClass
 *
 * @author eugene
 * 
 * Class to check the correctness of Russian 
 * Word: Комментарий ending when made plural.
 * Constructor Params: INT
 */
class PluralFormClass
{

    //const INIT_WORD = "Комментарий";

    private $num;
    private $word;
    //array of all possible word endings
    private $wordEndings = [
        "ий",
        "ия",
        "иев"
    ];

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function setNumber($num)
    {
        $this->num = $num;
    }

    public function getWord()
    {
        return $this->word;
    }

    //generates plural form. Checks which plural form it should assign
    public function generatePluralForm()
    {
        $this->word = "Комментарий";
        if ($this->isException() || $this->isTheRest()) {
            $this->word = str_replace($this->wordEndings[0], $this->wordEndings[2], $this->word);
        } elseif ($this->isSingular()) {
            //same as initword
        } elseif ($this->isTwoThreeFour()) {
            $this->word = str_replace($this->wordEndings[0], $this->wordEndings[1], $this->word);
        }
    }

    //check if the given number ends on 1
    private function isSingular()
    {
        return (mb_substr($this->num, -1) == 1) ? true : false;
    }

    //check if given number ends on 2|3|4
    private function isTwoThreeFour()
    {
        return (mb_substr($this->num, -1) == 2 || mb_substr($this->num, -1) == 3 ||
            mb_substr($this->num, -1) == 4) ? true : false;
    }

    //check the rest of possible conditions
    private function isTheRest()
    {
        return (mb_substr($this->num, -1) == 0 || (mb_substr($this->num, -1) >= 5 &&
            mb_substr($this->num, -1) <= 9)) ? true : false;
    }

    //check if the number ends on 11|12|13|14|15|16|17|18|19
    private function isException()
    {
        if ($this->num > 10) {
            return (mb_substr($this->num, -2) >= 11 && mb_substr($this->num, -2) <= 19) ? true : false;
        } else {
            return false;
        }
    }
}
