<?php

//function to create array of set length with random int values
function createRandomValueArray($size)
{
    $randomArray = array();
    for ($i = 0; $i < $size; $i++) {
        $randomArray[] = rand();
    }
    return $randomArray;
}

//function to decide which way to sort
function sortArray(&$array, $order)
{
    switch ($order) {
        case "ascending":
            sort($array);
            break;
        case "descending":
            rsort($array);
            break;
        default:
            break;
    }
}
//receive and check request parameters: GET
if (is_numeric($_GET["size"]) && !empty($_GET["size"])) {
    if (isset($_GET["order"]) && !empty($_GET["order"])) {
        $size = $_GET["size"];
        $order = $_GET["order"];

        $randomArray = createRandomValueArray($size);
        $randomArrayString = implode(" ", $randomArray);

        $randomArrayMessage = "Here is the Random Value Array with the size " .
            $size . ": <br>";
        $randomArraySortedMessage = "Here is the Random Value Array with the size " .
            $size . " in " . $order . " order: <br>";

        sortArray($randomArray, $order); //pass by reference
        $randomArraySortedString = implode(" ", $randomArray);
    }
} else {
    $randomArrayMessage = "You must enter a size of an array and its order "
        . "of sorting!";
    $randomArraySortedMessage = "";

    $randomArrayString = "";
    $randomArraySortedString = "";
}
//encode array and echo it to the page of request
$jsonArray = ["randomArrayMessage" => $randomArrayMessage, "randomArray" =>
    $randomArrayString,
    "randomArraySortedMessage" => $randomArraySortedMessage, "randomArraySorted" =>
    $randomArraySortedString];
echo json_encode($jsonArray);

?>

