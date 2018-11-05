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

            function getDateDifference(firstDate, secondDate) {

                if (document.getElementById('secondsOption').checked) {
                    var scale = document.getElementById('secondsOption').value;
                } else if (document.getElementById('minutesOption').checked) {
                    var scale = document.getElementById('minutesOption').value;
                } else if (document.getElementById('hoursOption').checked) {
                    var scale = document.getElementById('hoursOption').value;
                } else if (document.getElementById('daysOption').checked) {
                    var scale = document.getElementById('daysOption').value;
                } else if (document.getElementById('weeksOption').checked) {
                    var scale = document.getElementById('weeksOption').value;
                } else if (document.getElementById('monthsOption').checked) {
                    var scale = document.getElementById('monthsOption').value;
                } else if (document.getElementById('yearsOption').checked) {
                    var scale = document.getElementById('yearsOption').value;
                } else {
                    var scale = 0;
                }

                if (firstDate.length === 0 || secondDate.length === 0 || scale === 0) {

                    document.getElementById("dateDifferenceMessage").innerHTML = "Please Provide Two Properly Formatted Dates! Format: dd-mm-YYYY";
                    document.getElementById("dateDifference").innerHTML = "";
                    return false;

                } else {
                    const ids = ["dateDifferenceMessage", "dateDifference"];
                    doAJAXwithJSON(ids, "GET", "dateDifferenceBackend.php?firstDate=" + firstDate + "&secondDate=" + secondDate + "&scale=" + scale);

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
                <h1>Date Difference <span class="glyphicon glyphicon-book"></span></h1>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="well well-lg">
                        <h2 id="sortArrayHeader">Delta Date<span class="glyphicon glyphicon-stats"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="firstDateEntry">First Date:</label>
                                <input type="text" name="firstDate" class="form-control" id="firstDateEntry"><br>
                                <label for="secondDateEntry">Second Date:</label>
                                <input type="text" name="secondDate" class="form-control" id="secondDateEntry"><br>
                                <div class="radio">
                                    <label><input type="radio" name="scale" value="sec" id="secondsOption">In Seconds</label>
                                    <label><input type="radio" name="scale" value="min" id="minutesOption">In Minutes</label>
                                    <label><input type="radio" name="scale" value="hour" id="hoursOption">In Hours</label>
                                    <label><input type="radio" name="scale" value="day" id="daysOption">In Days</label>
                                    <label><input type="radio" name="scale" value="week" id="weeksOption">In Weeks</label>
                                    <label><input type="radio" name="scale" value="mon" id="monthsOption">In Months</label>
                                    <label><input type="radio" name="scale" value="year" id="yearsOption">In Years</label>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getDateDifference(
                                                document.getElementById('firstDateEntry').value,
                                                document.getElementById('secondDateEntry').value);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3 id="dateDifferenceMessage"></h3>
                    <h2 id="dateDifference"></h2>
                </div>
            </div>
        </div>
        <?php
        // put your code here

        ?>
    </body>
</html>
