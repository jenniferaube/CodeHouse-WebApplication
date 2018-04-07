<?php

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
	<!-- Custom Javascript -->
	<script src="assets/js/timeout.js"></script>

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
				<!--Script to disable resubmission. -->
				<script>
					$(document).ready(function () {

						$("#contact-form").submit(function (e) {


							//disable the submit button
							$("#btn-submit").attr("disabled", true);

							//disable a normal button
							$("#btn-submit").attr("disabled", true);

							return true;

						});
					});
				</script>


				<form id="contact-form" method="post" action="message_sent.php" role="form">

					<div class="messages"></div>

					<div class="controls">

						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
							
									<label for="form_time">Time*</label>
									
									 <select id="form_time" name="time" class="form-control form-control-lg" required="required" data-error="Time slot must be available.">
											<option value="" selected disabled>Select Time </option>
										<?php
										$conn = Connection::getConnection();
										list($month, $day, $year) = explode("/", $_POST["datetimepicker"]);
										$student = $_SESSION['userLogin'];
										$prof = $_POST['form_prof'];
										
										$datetimepicker = $_POST["datetimepicker"];
										$final_date = "$year"."-"."$month"."-"."$day"."%";
										//Format is yyyy-mm-dd in database.
										$sql = "select distinct class_start_time as office from class where class_start_time like '$final_date' and course_id in
										(select course_id from course where prof_id ='$prof' and course_id like '9999%');";
										$result = mysqli_query($conn, $sql);
										
										while($row =  mysqli_fetch_array($result)) {
											?><option> <?php echo $row['office']; ?></option>
										<?php } ?> 
										</select>
										<?php 
										
										$sql = "select u.email as mail from user u where u.id = '$prof';";
										$result = mysqli_query($conn, $sql);
										 
										$_SESSION['selected_prof'] = mysqli_fetch_array($result)['mail'];
										?>
										
									
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<p class="lead">Please type in your reason for requesting appointment.</p>
							<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="form_message">Message *</label>
									<textarea id="form_message" name="message" class="form-control" placeholder="Reason for Appointment" rows="3" required="required" data-error="Reason required."></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-12">
								<input id="btn-submit" type="submit" class="btn btn-success btn-send" value="Send Request">
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
<script type="text/javascript" src="assets/js/keyboard-student.js"></script>
<script src="assets/js/history.js"></script>

</body>
