<?php
require "CaptchaClass.php";

session_start();

//create an instance of CaptchaClass
$captchaObject = new CaptchaClass();
//generate Captcha image
$captchaObject->generateCaptcha(120, 30);
//put CaptchaObject in SESSION
$captchaObject->setupSession();

?>