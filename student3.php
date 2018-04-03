<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 4/1/2018
 * Time: 7:42 AM
 */


include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/dao/appointment_DAO.php";

$session = new Session();
$session->blockPage();
$session->blockProfessor();
$session->blockAdmin();
$session->logoutUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule</title>

    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.js"></script>
    <!-- moment -->
    <script type="text/javascript" src="resources/moment/moment-with-locales.js"></script>
    <!-- Bootstrap@3.3.7 -->
    <script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

    <!--bootstrap-datetimepicker -->
    <script type="text/javascript" src="resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
    <!-- Jquery-UI@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Mottie Keyboard -->
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-student.css">


</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/logged_out.php" ><img src="/assets/img/ac-icon.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a class="icon" href="/student.php"><img src="/assets/img/home.png"></a></li>
            </ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">
                <li><a><?php echo $_SESSION['userLogin']; ?></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/student.php?logout=map"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2">

            <h1>Request Appointment</h1>

            <p class="lead">Please select an appointment time.</p>

            <form id="contact-form" method="post" action="student4.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="form_time">Time *</label>
                                <input id="form_time" type="text" name="time" class="form-control input-lg" placeholder="Please select a time *" required="required" data-error="A time must be selected.">
                                <script type="text/javascript">
                                    $(function () {
                                        $('#form_time').datetimepicker({
                                            format: 'LT'
                                        })
                                    });
                                </script>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Next">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted"><strong>*</strong> These fields are required.</p>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>


<?php include 'footer.php'; ?>


<script src="assets/js/history.js"></script>
<script src="assets/js/timeout.js"></script>

</body>
