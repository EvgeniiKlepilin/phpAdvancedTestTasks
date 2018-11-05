<?php
require "DateDifferenceClass.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//check request parameters
if (isset($_GET["firstDate"]) && !empty($_GET["firstDate"])) {
    if (isset($_GET["secondDate"]) && !empty($_GET["secondDate"])) {
        if (isset($_GET["scale"]) && !empty($_GET["scale"])) {

            //store parameters in variables
            $firstDate = $_GET["firstDate"];
            $secondDate = $_GET["secondDate"];
            $scale = $_GET["scale"];
            //create DateDifference Object
            $dateDifferenceObject = new DateDifferenceClass($firstDate, $secondDate, $scale);
            //store the result in message
            $dateDifferenceMessage = "The difference between " . $firstDate . " and " . $secondDate . " in " . $scale . " is:";
            $dateDifference = $dateDifferenceObject->getDateDifference();
        } else {
            $dateDifferenceMessage = "Please Choose a Time Scale Option!";
        }
    } else {
        $dateDifferenceMessage = "Please Enter Second Date!";
    }
} else {
    $dateDifferenceMessage = "Please Enter First Date!";
}

//encode JSON Array
$jsonArray = ["dateDifferenceMessage" => $dateDifferenceMessage, "dateDifference" => $dateDifference];
echo json_encode($jsonArray);
