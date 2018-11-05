<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['text']) && !empty($_POST['text']))
 {
   header('Content-disposition: attachment; filename=minifiedJSON.json');
   header('Content-type: application/txt');
   echo $_POST['text'];
   exit; //stop writing
 }