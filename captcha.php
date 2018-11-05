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
            function doAJAXwithJSON(ids, method, url) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        for (i = 0; i < ids.length; i++) {
                            document.getElementById(ids[i]).innerHTML = response[ids[i]];
                        }
                    }
                };
                xmlhttp.open(method, url, true);
                xmlhttp.setRequestHeader("Content-type", "application/json");
                xmlhttp.send();
            }

            function validateCaptcha(str) {
                if (str.length === 0) {

                    document.getElementById("captchaValidationMessage").innerHTML = "Please Enter Numbers you see on the picture: JS";
                    return false;

                } else {
                    const ids = ["captchaValidationMessage"];
                    doAJAXwithJSON(ids, "GET", "captchaBackend.php?str=" + str);
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
                <h1>CAPTCHA <span class="glyphicon glyphicon-book"></span></h1>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="sortArrayHeader">Captcha Generator<span class="glyphicon glyphicon-stats"></span></h2>
                        <form>
                            <div class="form-group">
                                <img src="captchaImage.php" width="120" height="30" border="1" alt="CAPTCHA">
                                <label for="captchaEntry">Enter Captcha Message:</label>
                                <input type="text" size="6" maxlength="5" name="captcha" class="form-control" id="captchaEntry"><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" 
                                       onclick="validateCaptcha(document.getElementById('captchaEntry').value);
                                               return false;">
                            </div>
                        </form>
                    </div>
                </div>


                <div class="col-sm-6">
                    <h3 id="captchaValidationMessage"></h3>
                </div>
            </div>
        </div>
    </body>
</html>
