<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'jsonUtil.php';

$jsonOutput = "";
$isDownload = false;

if (!empty($_FILES['jsonUpload'])) {
    $jsonFileOutput = file_get_contents($_FILES['jsonUpload']['tmp_name']);
    if (is_Json($jsonFileOutput)) {
        $jsonOutput = minifyJSON($jsonFileOutput);
        $isDownload = true;
        
    } else {
        $jsonOutput = "Provided File is Not JSON!";        
        $isDownload = false;
    }
} else {
    $jsonOutput = "Or Upload Your JSON File to get an Output here!";
    $isDownload = false;
}
/*
if($jsonOutput != "")
 {
   header('Content-disposition: attachment; filename=minifiedJSON.json');
   header('Content-type: application/txt');
   echo $jsonOutput;
   exit;
 }*/

?>

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
                            document.getElementById(ids[i]).innerHTML =
                                    response[ids[i]]; //should be same on PHP side
                            document.getElementById("downloadJSON").value = response["jsonResult"];
                            //saveTextAsFile();
                        }
                    }
                };
                xmlhttp.open(method, url, true);
                xmlhttp.setRequestHeader("Content-type", "application/json");
                xmlhttp.send();
            }

            function saveTextAsFile()
            {
                //document.getElementById('downloadLink').style.visibility = 'hidden';
                var textToWrite = document.getElementById("jsonResult").innerHTML; //Your text input;
                var textFileAsBlob = new Blob([textToWrite], {type: 'text/plain'});
                var fileNameToSaveAs = "minifiedJSON.json"; //Your filename;

                var downloadLink = document.getElementById('downloadLink');
                downloadLink.download = fileNameToSaveAs;
                downloadLink.innerHTML = "Download File: JS";
                if (window.webkitURL !== null)
                {
                    // Chrome allows the link to be clicked
                    // without actually adding it to the DOM.
                    downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
                } else
                {
                    // Firefox requires the link to be added to the DOM
                    // before it can be clicked.
                    downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
                    downloadLink.onclick = destroyClickedElement;
                    downloadLink.style.display = "none";
                    document.body.appendChild(downloadLink);
                }

                //downloadLink.click();
            }

            function getMinifiedJSON(json) {
                if (json.length === 0) {

                    document.getElementById("jsonEntry").value = "Please Enter Your JSON";
                    document.getElementById("jsonResult").value = "";
                    return false;

                } else {
                    const ids = ["jsonResult"];
                    doAJAXwithJSON(ids, "GET", "jsonMinifyBackend.php?json=" + json);
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
                <h1>JSON Minify <span class="glyphicon glyphicon-cloud"></span></h1>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="well well-lg">
                        <h2 id="jsonMinifyHeader">JSON Minify<span class="glyphicon glyphicon-cloud"></span></h2>
                        <form>
                            <div class="form-group">
                                <label for="comment">Enter Your JSON Here:</label>
                                <textarea class="form-control" rows="25" id="jsonEntry">Paste Your JSON here</textarea>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="getMinifiedJSON(
                                                document.getElementById('jsonEntry').value);
                                        return false;">


                                <label for="comment">Your Minified JSON:</label>
                                <textarea class="form-control" rows="25" id="jsonResult"><?php echo $jsonOutput; ?></textarea>                                

                            </div>

                        </form>
                        <div class="form-group"> 
                            <form action="jsonMinify.php" method="post" enctype="multipart/form-data" id="jsonUploadForm">
                                Select JSON File to upload:
                                <input type="file" name="jsonUpload" id="jsonFileEntry">
                                <input type="submit" value="Upload JSON" class="btn btn-primary btn-lg btn-block" onclick="uploadJSON(
                                                document.getElementById('jsonEntry').value);
                                        return false;">
                            </form>      
                        </div>
                        <h2><a id="downloadLink"></a></h2>
                        <form action="jsonDownload.php" method="post">
                            <input type="hidden" id="downloadJSON" value="<?php echo htmlentities($jsonOutput); ?>" name="text">
                            <input type="submit" value="Download File">
                        </form>
                        
                    </div>
                </div>
            </div>

            <?php
            // put your code here

            ?>
    </body>
</html>
