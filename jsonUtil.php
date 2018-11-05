<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//check if given string is JSON
function is_Json($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

//minify given JSON string, stripping it of whitespace and newline characters
function minifyJSON($json)
{
    return $jsonResult = trim(preg_replace('/\s+/', '', $json));
}
