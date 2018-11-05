<?php
require "CaptchaClass.php";

session_start();

//check parameters from request
if (isset($_GET["str"]) && !empty($_GET["str"])) {

    //store user input
    $str = $_GET["str"];
    //store CaptchaObject from SESSION
    $captchaObject = $_SESSION['captchaObject'];

    //check if they match and produce proper message
    if ($str != $captchaObject->getCaptchaString()) {
        $captchaValidationMessage = "Entered Captcha Doesn't Match!";
    } else {
        $captchaValidationMessage = "We have Successfully Validated Your Captcha!";
    }
} else {
    $captchaValidationMessage = "Please Enter Numbers you see on the picture";
}

//close session
session_destroy();
//encode the data
$jsonArray = ["captchaValidationMessage" => $captchaValidationMessage];
echo json_encode($jsonArray);

?>
