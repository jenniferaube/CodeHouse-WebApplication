<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

    $session = new Session();
    if ($session->isLogged()) {
        $session->destroy();
    };
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule</title>

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">


    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style-loggedout.css">

</head>
<body onload="afterlogout()">
	<!-- Custom Javascript -->
	<script src="assets/js/timeout.js"></script>

    <?php include_once $_SERVER['DOCUMENT_ROOT']."/include/nav.php"; ?>



<h1>Algonquin Appointment Book Kiosk</h1>
<!--<h2>To request an appointment booking with <br>-->
    <!--any professor of your program click the<br>-->
    <!--link on the left and login with your network<br>-->
    <!--creddentials.</h2>-->


    <div class="block-highlight">
		<p>
			You have been loggedout of the session.<br/>
			<a href="index.php"> Click here</a> to go to home page.
		</p>
    </div>



</body>
</html>