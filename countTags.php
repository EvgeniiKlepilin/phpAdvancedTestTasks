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
        <script type="text/javascript">
            function doAJAXwithJSON(ids, method, url) {//it works
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        for (i = 0; i < ids.length; i++) {
                            document.getElementById(ids[i]).innerHTML = response[ids[i]]; //should be same on PHP side
                        }
                    }
                };
                xmlhttp.open(method, url, true);
                xmlhttp.setRequestHeader("Content-type", "application/json");
                xmlhttp.send();
            }

            function getTagsNumber(url, tag) {
                if (url.length === 0 || tag === 0) {
                    document.getElementById("htmlPageMessage").innerHTML = "Please Provide URL and a tag to Search!";
                    document.getElementById("htmlTagsMessage").innerHTML = "";
                    return false;

                } else {
                    const ids = ["htmlPageMessage", "htmlTagsMessage"];
                    doAJAXwithJSON(ids, "GET", "countTagsBackend.php?url=" + url + "&tag=" + tag);
                }
            }
        </script>
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
                        <h2 id="countTagsHeader">Count Tags from a Webpage<span class="glyphicon glyphicon-stats"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="urlEntry">URL:</label>
                                <input type="text" name="url" class="form-control" id="urlEntry"><br>
                                <label for="tagEntry">Tag:</label>
                                <input type="text" name="tag" class="form-control" id="tagEntry"><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getTagsNumber(
                                                document.getElementById('urlEntry').value, document.getElementById('tagEntry').value);
                                        return false;">
                                    <a href="showTagResults.php">Show Results</a>
                            </div>
                        </form>
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
        <?php
        ?>
    </body>
</html>
