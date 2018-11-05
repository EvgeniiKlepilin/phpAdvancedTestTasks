<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InputValidationClass
 *
 * @author eugene
 * 
 * Class to validate input based on various criteria.
 * Constructor Parameters: String
 */
class InputValidationClass
{

    protected $input;
    private $countryPhoneFormat = [
        'KGZ' => '/(9)(9)(6)(\()(\d)(\d)(\d)(\))(\d)(\d)(-)(\d)(\d)(-)(\d)(\d)/is',
        'USA' => '/^([0-9]( |-)?)?(\(?[0-9]{3}\)?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/is',
        'RUS' => '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/is'
    ];
    private $countryDateFormat = [
        'RUS' => '/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/',
        'USA' => '/^(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])-[0-9]{4}$/',
        'CHN' => '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/'
    ];

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function setInput($input)
    {
        $this->input = $input;
    }

    //checks whether input is greater than given limit
    public function isWithinMinLimit($limit)
    {
        $match = preg_match("/.{" . $limit . ",}/is", $this->input);

        if ($match != false) {
            return true;
        } else {
            return false;
        }
        //Alternative Solution:
        /* if (!$limit || empty($limit)) {
          return false;
          } else {
          if (strlen($this->input) < $limit) {
          return false;
          } else {
          return true;
          }
          } */
    }

    //check whether input is smaller than given limit
    public function isWithinMaxLimit($limit)
    {
        $match = preg_match("/^.{0," . $limit . "}$/is", $this->input);

        if ($match != false) {
            return true;
        } else {
            return false;
        }
        //Alternative Solution:
        /* if (!$limit || empty($limit)) {
          return false;
          } else {
          if (strlen($this->input) > $limit) {
          return false;
          } else {
          return true;
          }
          } */
    }

    //check whether input is a phone number complying with given country standard
    public function isPhoneEntry($countryCode)
    {

        $match = preg_match($this->countryPhoneFormat[$countryCode], $this->input);

        if ($match != false) {
            return true;
        } else {
            return false;
        }
    }

    //check whether input is an email
    public function isEmailEntry()
    {
        if (filter_var($this->input, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    //check whether input is a number
    public function isNumberEntry()
    {
        //Alternative Solution:        
        //return is_numeric($this->input);
        if (preg_match('/^[0-9]+$/', $this->input)) {
            return true;
        } else {
            return false;
        }
    }

    //check whether input is a string
    public function isStringEntry()
    {
        //Alternative Solution:        
        //return ctype_alpha($this->input);
        if (preg_match('/^[a-z]+$/', $this->input)) {
            return true;
        } else {
            return false;
        }
    }

    //check whether input is a date complying with given country standard
    public function isDateEntry($countryCode)
    {
        $match = preg_match($this->countryDateFormat[$countryCode], $this->input);

        if ($match != false) {
            return true;
        } else {
            return false;
        }
    }
}
