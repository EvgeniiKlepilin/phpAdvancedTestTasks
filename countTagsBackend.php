<?php
require "CountTagsClass.php";
require "CountTagsDBClass.php";
require "dbini.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//validate request parameters
if (isset($_GET["url"]) && !empty($_GET["url"])) {
    if (isset($_GET["tag"]) && !empty($_GET["tag"])) {
        $countTagsObject = new CountTagsClass($_GET["url"], $_GET["tag"]);
        
        //NOTE: the security of this statement is very weak
        $query = "INSERT INTO tag_info (url, content, tag, count) VALUES ('" . 
            $_GET["url"] . "', 'html', '" . $_GET["tag"] . "', '" . 
            $countTagsObject->getTagsNumber() ."')";
        
        //create CountTagsDB Object
        $countTagsDBObject = new CountTagsDBClass($servername, $username, $password, $dbname, $query);
        $countTagsDBObject->connect();
        //process given INSERT query
        $countTagsDBObject->processInsertQuery();
        $countTagsDBObject->disconnect();
        
        //generate output message
        $htmlPageMessage = "<pre>" . htmlspecialchars($countTagsObject->getHtml()) . "</pre>";
        $htmlTagsMessage = "There are " . $countTagsObject->getTagsNumber() .
            " occurrences of &lt;" . $countTagsObject->getTag() . "&gt; in " .
            $countTagsObject->getUrl();
    } else {
        $htmlPageMessage = "Please Provide HTML Tag";
        $htmlTagsMessage = "";
    }
} else {
    $htmlPageMessage = "Please Provide URL";
    $htmlTagsMessage = "";
}

//encode JSON Array
$jsonArray = ["htmlPageMessage" => $htmlPageMessage,
    "htmlTagsMessage" => $htmlTagsMessage];
echo json_encode($jsonArray);
