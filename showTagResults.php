<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>IROKEZ Internship Exercises II</h1> 
                <p>Following is the list of the next level exercises necessary to finish. These
                    are complete and working examples made with PHP, JS, AJAX, HTML, and BootStrap.</p> 
            </div>
            <div class="btn-group btn-group-justified">
                <a href="index.php" class="btn btn-primary">1</a>
                <a href="jsonMinify.php" class="btn btn-primary">2</a>
                <a href="inputValidation.php" class="btn btn-primary">3</a>
                <a href="captcha.php" class="btn btn-primary">4</a>
                <a href="pluralForm.php" class="btn btn-primary">5</a>
                <a href="dateDifference.php" class="btn btn-primary">6</a>
                <a href="countTags.php" class="btn btn-primary">7</a>
            </div>
            <div class="page-header">
                <h1>Count Tags <span class="glyphicon glyphicon-book"></span></h1>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="well well-lg">
                        <h2 id="countTagsHeader">Tag Results from Webpages<span class="glyphicon glyphicon-stats"></span></h2>
                        <a href="countTags.php">Go Back</a>
                        <?php
                        require "CountTagsDBClass.php";
                        require "dbini.php";

                        $query = "SELECT id, url, tag, count FROM tag_info";
                        
                        //create CountTagsDB Object
                        $countTagsDBObject = new CountTagsDBClass($servername, $username, $password, $dbname, $query);
                        $countTagsDBObject->connect();
                        //process given query
                        $countTagsDBObject->processSelectQuery();
                        //echo the ouput
                        echo $countTagsDBObject->getMessage();
                        $countTagsDBObject->disconnect();

                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 id="htmlTagsMessage"></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p id="htmlPageMessage"></p>
                </div>
            </div>

        </div>
        <?php ?>
    </body>
</html>
