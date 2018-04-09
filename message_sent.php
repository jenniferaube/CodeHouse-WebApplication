<?php
//Created by: Hiral Nilesh Bhatt
//Date: March 31, 2018
//Last modified: April 2, 2018 by Hiral Nilesh Bhatt
	include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/dao/appointment_DAO.php";
    $session = new Session();
    $session->blockPage();
    $session->blockProfessor();
    $session->blockAdmin();
    $session->logoutUser();
	
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/SMTP.php';
	
	$mail = new PHPMailer\PHPMailer\PHPMailer();
    


	
	 $subject = "Algonquin Kiosk Appointment Request";
	 $message = $_POST['message'];
	 
	 $time = $_POST['time'];
	 
	 $prof_email = $_SESSION['selected_prof'];

	 $student =  $_SESSION['userLogin'];
	 $student_name = $_SESSION['userfName'] . ' '. $_SESSION['userlName'];
	
	$password = "GoHabsGo!";
	$from = "ictkiosk@algonquincollege.com";
	//ictkiosk@algonquincollege.com-- GoHabsGo!

	$txt_prof = "Hello, \r\n\r\n An appointment has been requested by student: ". $student_name. " on " .$time. ".\r\n The reason specified: " .$message.". \r\n Please reach out to the student at:".$student."\r\nThank you.";
	$txt_stud = "Hello, \r\n\r\n Following request was made by you: \r\n" . $message." to your professor.\r\n Professor will reply back for confirmation.\r\n Thank you.";
	
  $mail->Host = "smtp.office365.com";
  $mail->Port = 587;
  $mail->Username = $from;
  $mail->Password = $password;
  $mail->SMTPDebug = 0;
  $mail->IsSMTP(); // Use SMTP
  $mail->CharSet = 'UTF-8';
  $mail->SMTPSecure = 'STARTTLS';
  $mail->SMTPAuth = true; 
  //Sending the actual email
  $mail->setFrom($from, 'Kiosk System');
  $mail->addAddress($prof_email, 'Professor');     // Add a recipient
  $mail->isHTML(false);                                  // Set email format to HTML
  $mail->Subject = 'Algonquin Kiosk Appointment Request';
  $mail->Body = $txt_prof;
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
	<link rel="stlesheet" type="text/css" href="assets/css/style-messagesent.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
	

</head>
<body onload='autologout()'>
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
                <li><a><?php echo $_SESSION["userLogin"]; ?></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/student.php?logout=map"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


   <div>

		<h1>Algonquin Appointment Book Kiosk</h1>

		<div class="info-block">
		<h4>
		<?php
		 try{
				$mail->send();
				echo "Your request for appointment with professor has been sent successfully. \r\n
			Your professor will contact you to your algonquin-live email account in 24 hours.";
    
			} catch(Exception $e){
				//Something went bad
				echo "Please contact your administrator. ";
			}
			$mail->ClearAllRecipients();
			$mail->Body = $txt_stud;
			$mail->addAddress($student, 'Professor');
			$mail->send();
			?>
			
		</h4>
		<h4>
		Please <a href="/student.php" style="color: #aaaaaa;">click here</a> to book another appointment.
		</h4>
    </div>
</div>


    <?php include 'footer.php'; ?>

</body>
</html>
