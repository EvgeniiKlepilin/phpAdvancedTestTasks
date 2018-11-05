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
        <!-- GOOGLE CHARTS -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        
        <script type="text/javascript">
            function doAJAXwithJSON(ids, method, url) {//it works
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState === 4 && this.status === 200) {
                        var response = JSON.parse(this.responseText);
                        for (i = 0; i < ids.length; i++) {
                            //document.getElementById(ids[i]).innerHTML = response[ids[i]];
                            //get data into array
                            var str = response['randomArray'];
                            var randomArray = str.split(' ');
                            var str1 = response['randomArraySorted'];
                            var sortedRandomArray = str1.split(' ');
                            
                            
                            //Google Charts Presentation
                            google.charts.load('current', {'packages': ['bar']});
                            google.charts.setOnLoadCallback(drawUnsortedChart);
                            google.charts.setOnLoadCallback(drawSortedChart);

                            function drawUnsortedChart() {

                                var data = new google.visualization.DataTable();
                                data.addColumn('number', 'Index');
                                data.addColumn('number', 'Value');
                                data.addRows(randomArray.length);
                                for(var i = 0; i < randomArray.length; i++){
                                    data.setValue(i, 0, i);
                                    data.setValue(i, 1, randomArray[i]);
                                }
                                
                                

                                var options = {
                                    chart: {
                                        title: 'Unsorted Array Chart',
                                        subtitle: 'Random Values of an array Unsorted',
                                    }
                                };

                                var chart = new google.charts.Bar(document.getElementById('unsorted_chart_div'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            
                            function drawSortedChart() {

                                var data = new google.visualization.DataTable();
                                data.addColumn('number', 'Index');
                                data.addColumn('number', 'Value');
                                data.addRows(sortedRandomArray.length);
                                for(var i = 0; i < sortedRandomArray.length; i++){
                                    data.setValue(i, 0, i);
                                    data.setValue(i, 1, sortedRandomArray[i]);
                                }
                                
                                

                                var options = {
                                    chart: {
                                        title: 'Sorted Array Chart',
                                        subtitle: 'Random Values of an array Sorted',
                                    }
                                };

                                var chart = new google.charts.Bar(document.getElementById('sorted_chart_div'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                        }
                    }
                };
                xmlhttp.open(method, url, true);
                xmlhttp.setRequestHeader("Content-type", "application/json");
                xmlhttp.send();
            }

            function getSortedArray(size) {
                if (document.getElementById('ascendingOrderOption').checked) {
                    var order = document.getElementById('ascendingOrderOption').value;
                } else if (document.getElementById('descendingOrderOption').checked) {
                    var order = document.getElementById('descendingOrderOption').value;
                } else {
                    var order = 0;
                }
                if (size.length === 0 || size <= 0 || order === 0) {

                    document.getElementById("randomArrayMessage").innerHTML = "Please Provide a Proper Array Size and Order!";
                    document.getElementById("randomArray").innerHTML = "";
                    document.getElementById("randomArraySortedMessage").innerHTML = "";
                    document.getElementById("randomArraySorted").innerHTML = "";
                    return false;

                } else {
                    const ids = ["randomArrayMessage", "randomArray", "randomArraySortedMessage", "randomArraySorted"];
                    doAJAXwithJSON(ids, "GET", "sortedArray.php?size=" + size + "&order=" + order);
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
                <h1>Sorting Array <span class="glyphicon glyphicon-book"></span></h1>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="well well-lg">
                        <h2 id="sortArrayHeader">Sort Random Array<span class="glyphicon glyphicon-stats"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="randomArraySizeEntry">Array Size:</label>
                                <input type="number" name="size" class="form-control" id="randomArraySizeEntry"><br>
                                <div class="radio">
                                    <label><input type="radio" name="order" value="ascending" id="ascendingOrderOption">Ascending Order</label>
                                    <label><input type="radio" name="order" value="descending" id="descendingOrderOption">Descending Order</label>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getSortedArray(
                                                document.getElementById('randomArraySizeEntry').value);
                                        return false;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="unsorted_chart_div"></div>
                    <div id="sorted_chart_div"></div>

                    <h3 id="randomArrayMessage"></h3>
                    <h2 id="randomArray"></h2>

                    <h3 id="randomArraySortedMessage"></h3>
                    <h2 id="randomArraySorted"></h2>
                </div>
            </div>
        </div>
        <?php
        // put your code here

        ?>
    </body>
</html>
