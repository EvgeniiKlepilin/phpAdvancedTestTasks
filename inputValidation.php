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
                            document.getElementById(ids[i]).innerHTML = response[ids[i]]; //should be same on PHP side
                        }
                    }
                };
                xmlhttp.open(method, url, true);
                xmlhttp.setRequestHeader("Content-type", "application/json");
                xmlhttp.send();
            }

            function getInputValidation(value, type) {
                switch (type) {
                    case 0:
                        doAJAXwithJSON(["minEntryMessage"], "GET",
                                "inputValidationBackend.php?min=" + value + "&type=min");
                        break;
                    case 1:
                        doAJAXwithJSON(["maxEntryMessage"], "GET",
                                "inputValidationBackend.php?max=" + value + "&type=max");
                        break;
                    case 2:
                        doAJAXwithJSON(["phoneEntryMessage"], "GET",
                                "inputValidationBackend.php?phone=" + value + "&type=phone");
                        break;
                    case 3:
                        doAJAXwithJSON(["emailEntryMessage"], "GET",
                                "inputValidationBackend.php?email=" + value + "&type=email");
                        break;
                    case 4:
                        doAJAXwithJSON(["numberEntryMessage"], "GET",
                                "inputValidationBackend.php?number=" + value + "&type=number");
                        break;
                    case 5:
                        doAJAXwithJSON(["stringEntryMessage"], "GET",
                                "inputValidationBackend.php?string=" + value + "&type=string");
                        break;
                    case 6:
                        doAJAXwithJSON(["dateEntryMessage"], "GET",
                                "inputValidationBackend.php?date=" + value + "&type=date");
                        break;
                    default:
                        document.getElementById("inputValidationHeader").innerHTML = "AJAX Error: Switch Default";

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
                <a href="dateDifference.php" class="btn btn-primary"><6</a>
                <a href="countTags.php" class="btn btn-primary">7</a>
            </div>
            <div class="page-header">
                <h1>Input Validation <span class="glyphicon glyphicon-pencil"></span></h1>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Minimum Characters Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="minEntry">5 Minimum Characters Validation</label>
                                <input type="text" name="min" class="form-control" id="minEntry"><br>                                
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('minEntry').value, 0);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="minEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Maximum Character Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="minEntry">20 Maximum Characters Validation</label>
                                <input type="text" name="max" class="form-control" id="maxEntry"><br>                                
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('maxEntry').value, 1);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="maxEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Phone Entry Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="phoneEntry">Phone Entry Validation</label>
                                <input type="text" name="phone" class="form-control" id="phoneEntry"><br>                             
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('phoneEntry').value, 2);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="phoneEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Email Entry Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="emailEntry">Email Entry Validation</label>
                                <input type="text" name="email" class="form-control" id="emailEntry"><br>                        
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('emailEntry').value, 3);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="emailEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Number Entry Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="numberEntry">Number Entry Validation</label>
                                <input type="text" name="number" class="form-control" id="numberEntry"><br>                 
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('numberEntry').value, 4);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="numberEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">String Entry Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="stringEntry">String Entry Validation</label>
                                <input type="text" name="string" class="form-control" id="stringEntry"><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('stringEntry').value, 5);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="stringEntryMessage"></h3>                                

                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="well well-lg">
                        <h2 id="inputValidationHeader">Date Entry Validation<span class="glyphicon glyphicon-pencil"></span></h2>
                        <form>
                            <div class="form-group">      
                                <label for="dateEntry">Date Entry Validation</label>
                                <input type="text" name="date" class="form-control" id="dateEntry"><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getInputValidation(
                                                document.getElementById('dateEntry').value, 6);
                                        return false;">


                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="well well-lg">

                        <h3 id="dateEntryMessage"></h3>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        // put your code here

        ?>
    </body>
</html>
