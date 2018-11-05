<?php
require "PluralFormClass.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//check request parameters. Can also accept 0.
if (isset($_GET["num"]) && (!empty($_GET["num"]) || $_GET["num"] === "0")) {

    $num = $_GET["num"];
    //create PluralFormObject
    $pluralFormObject = new PluralFormClass($num);
    //generate plural form
    $pluralFormObject->generatePluralForm();
    //store the number in a message
    $pluralFormMessage = $num . " " . $pluralFormObject->getWord();
} else {
    $pluralFormMessage = "Please Enter a Number";
}

//encode JSON array
$jsonArray = ["pluralFormMessage" => $pluralFormMessage];
echo json_encode($jsonArray);
