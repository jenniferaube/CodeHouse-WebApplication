<?php
/*
 * File: file_upload.php
 * Author: Qiuju Zhu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/session.php";
//$session = new Session();
//$session->blockPage();
//$session->blockProfessor();
//$session->logoutUser();
if (isset($_POST['submit_btn'])) {
    $save_dir = "./file_upload/files/";
    date_default_timezone_set('America/Toronto');
    $temp = explode(".", $_FILES["upload_file"]["name"]);
    $extension = end($temp);
    $date = date('YmdHis');
    $new_file_name = $date . '.' . $extension; //use timestamp to replace original file name
    if (is_uploaded_file($_FILES["upload_file"]["tmp_name"])) {
        $dest = $save_dir . $new_file_name;
        if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $dest)) {
            echo "<script language='javascript'>";
            echo 'if(alert("Success to upload")){';
            echo 'window.location.reload();}'; //reload page
            echo "</script>";
        } else {
            echo "<script language='javascript'>";
            echo 'if(alert("Fail to upload")){';
            echo 'window.location.reload();}';
            echo "</script>";
        }
    } else {
        echo "fail1";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Upload</title>

    <!-- Jquery-UI-CSS@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">
    <!-- JQuery UI-->
    <script type="text/javascript" src="resources/jquery-ui/js/jquery-ui.min.js"></script>
    <!--  JQuery  -->
    <script type="text/javascript" src="/resources/jquery/js/jquery.min.js"></script>
    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">

    <!--Jquery script.   -->
    <script>
        $(document).ready(function () {
            $('#upload_file').change(
                function () {
                    //for testing, allow csv file to be validated
                    var fileExtension = ['csv'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) { //check file extension
                        alert("Please choose a CSV file.");
                        //$('#upload_file').attr("disabled", true);
                        $('#submit_btn').attr("disabled", true);
                    }
                    else {
                        $('#upload_file').attr("disabled", false);
                        $('#submit_btn').attr("disabled", false);
                    }
                })
            $('#cancel_btn').click(
                function() {
                    this.form.reset();
                    $('#upload_file').attr("disabled", false);
                    $('#submit_btn').attr("disabled", false);
                }
            )
        });
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
<!-- Fixed navbar -->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="/assets/img/ac-icon.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav"></ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">
                <li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- File Upload Form -->
<div class="container" style="position: relative; margin-top: 100px;">
    <div class="file-upload-container">
        <form class="form" id="upload_form" method="post" enctype="multipart/form-data"
              action="<?php $_SERVER['PHP_SELF'] ?>">
            <div class="form-group">
                <input type="file" name="upload_file" class="form-control" id="upload_file" placeholder="Choose file"
                       autocomplete="off"
                       style="position: relative; margin-top: 15%; height: 50px; font-size:26px;">
            </div>
            <div class="form-group">
                <div class="form-group" style="position: relative; margin-top: 10%;">
                    <button type="button" class="btn" id="cancel_btn" style="width: 250px;">
                        <span class="glyphicon glyphicon-ban-circle"></span>
                        <span>Reset</span>
                    </button>
                    <button type="submit" name="submit_btn" class="btn pull-right" style="width: 250px; background-color: #006341;"
                            id="submit_btn">
                        <span class="glyphicon glyphicon-upload" style="color: #FFFFFF;"></span>
                        <span style="color: #FFFFFF;">Upload File</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
