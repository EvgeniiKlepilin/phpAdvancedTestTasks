<?php
require 'InputValidationClass.php';

//outputs success or faliure message
function getMessage($bool)
{
    if ($bool) {
        return "Validation is Successful!";
    } else {
        return "Validation is Unsuccessful!";
    }
}
//determine which validation to choose
switch ($_GET['type']) {


    case "min":
        if (isset($_GET["min"]) && !empty($_GET["min"])) {
            //create an instance based on a given input string
            $minInputObject = new InputValidationClass($_GET["min"]);
            //get message based on the result of validation
            $minEntryMessage = getMessage($minInputObject->isWithinMinLimit(5));
            //put message value into jsonArray
            $jsonArray = ["minEntryMessage" => $minEntryMessage];
        } else {
            //put error into message in jsonArray
            $minEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["minEntryMessage" => $minEntryMessage];
        }
        break;
    case "max":
        if (isset($_GET["max"]) && !empty($_GET["max"])) {
            $maxInputObject = new InputValidationClass($_GET["max"]);
            $maxEntryMessage = getMessage($maxInputObject->isWithinMaxLimit(20));
            $jsonArray = ["maxEntryMessage" => $maxEntryMessage];
        } else {
            $maxEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["maxEntryMessage" => $maxEntryMessage];
        }
        break;
    case "phone":
        if (isset($_GET["phone"]) && !empty($_GET["phone"])) {
            $phoneInputObject = new InputValidationClass($_GET["phone"]);
            $phoneEntryMessage = getMessage($phoneInputObject->isPhoneEntry('KGZ'));
            $jsonArray = ["phoneEntryMessage" => $phoneEntryMessage];
        } else {
            $phoneEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["phoneEntryMessage" => $phoneEntryMessage];
        }
        break;
    case "email":
        if (isset($_GET["email"]) && !empty($_GET["email"])) {
            $emailInputObject = new InputValidationClass($_GET["email"]);
            $emailEntryMessage = getMessage($emailInputObject->isEmailEntry());
            $jsonArray = ["emailEntryMessage" => $emailEntryMessage];
        } else {
            $emailEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["emailEntryMessage" => $emailEntryMessage];
        }
        break;
    case "number":
        if (isset($_GET["number"]) && !empty($_GET["number"])) {
            $numberInputObject = new InputValidationClass($_GET["number"]);
            $numberEntryMessage = getMessage($numberInputObject->isNumberEntry());
            $jsonArray = ["numberEntryMessage" => $numberEntryMessage];
        } else {
            $numberEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["numberEntryMessage" => $numberEntryMessage];
        }
        break;
    case "string":
        if (isset($_GET["string"]) && !empty($_GET["string"])) {
            $stringInputObject = new InputValidationClass($_GET["string"]);
            $stringEntryMessage = getMessage($stringInputObject->isStringEntry());
            $jsonArray = ["stringEntryMessage" => $stringEntryMessage];
        } else {
            $stringEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["stringEntryMessage" => $stringEntryMessage];
        }
        break;
    case "date":
        if (isset($_GET["date"]) && !empty($_GET["date"])) {
            $dateInputObject = new InputValidationClass($_GET["date"]);
            $dateEntryMessage = getMessage($dateInputObject->isDateEntry('RUS'));
            $jsonArray = ["dateEntryMessage" => $dateEntryMessage];
        } else {
            $dateEntryMessage = "Couldn't Validate Your Entry!";
            $jsonArray = ["dateEntryMessage" => $dateEntryMessage];
        }
        break;
    default :
        $minEntryMessage = "Couldn't Validate Your Entry! No Type Selected!";
        $jsonArray = ["minEntryMessage" => $minEntryMessage];
        break;
}

echo json_encode($jsonArray);

