<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 4/1/2018
 * Time: 7:43 AM
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

            <p class="lead">Please indicate a reason, you will receive an email confirmation within 24 hours.</p>

            <form id="contact-form" method="post" action="message_sent.php" role="form">

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Reason for Appointment *" rows="4" required="required" data-error="Reason required."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send Request">
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

<!-- Jquery@1.9.1 -->
<script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>

<!-- Jquery-UI@1.9.2 -->
<script type="text/javascript" src="resources/jquery-ui/js/jquery-ui.js"></script>

<!-- Mottie Keyboard -->
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.keyboard.js"></script>
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.keyboard.extension-typing.min.js"></script>

<!-- Bootstrap@3.3.7 -->
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="assets/js/keyboard-student.js"></script>
<script src="assets/js/history.js"></script>
<script src="assets/js/timeout.js"></script>


<?php include 'footer.php'; ?>

</body>
