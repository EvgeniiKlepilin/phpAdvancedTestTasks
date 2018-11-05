<?php
require "jsonUtil.php";
//check if value from request exists and is not empty
if (isset($_GET["json"]) && !empty($_GET["json"])) {
    $json = $_GET["json"];
    if (is_Json($json)) {
        $jsonResult = minifyJSON($json);
    } else {
        $jsonResult = "Provided Snippet is not JSON!";
    }
} else {
    $jsonResult = "Please Enter Your JSON";
}
//encode array and echo it to the page of request
$jsonArray = ["jsonResult" => $jsonResult];
echo json_encode($jsonArray);


