<?php
	require 'PHPMailer.php';
	
	$mail = new PHPMailer();
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";

    $session = new Session();
    $session->blockPage();
    $session->blockProfessor();
    $session->blockAdmin();
    $session->logoutUser();

	
	 $subject = "Algonquin Kiosk Appointment Request";
	 $message = $_POST['message'];
	 
	 $time = $_POST['time'];
	 
	 $prof_email = $_SESSION['selected_prof'];

	 $student =  $_SESSION['userLogin'];
	 $student_name = $_SESSION['userfName'] . ' '. $_SESSION['userlName'];
	 $host = "mail.example.com";
	$username = "ictKiosk@algonquincollege.com";
	$password = "GoHabsGo!";
	$from = "ictKiosk@algonquincollege.com";
	


	$txt_prof = 'An appointment has bee requested by student: '. $student_name. ' on' .$time. 'The reason specified: ' .$message.'Please reach out to the student at:'.$student;
	$txt_stud = 'Following request was made by you: ' . $message.' to your professor. Professor will reply back for confirmation.';
	

  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.office365.com";
  $mail->Port = 587;
  $mail->Username = $username;
  $mail->Password = $password;
  $mail->SMTPDebug = 1;
  //Sending the actual email
  $mail->setFrom($username, 'Kiosk System');
  $mail->addAddress($prof_email, 'Professor');     // Add a recipient
  $mail->isHTML(false);                                  // Set email format to HTML
  $mail->Subject = 'Algonquin Kiosk Appointment Request';
  $mail->Body = $txt_prof;

  if(!$mail->send()) {
    echo 'Message could not be sent. ';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
  }
	
	
	$mail = $smtp->send($to, $headers, $txt_prof);

	//$a = mail('bhat0074@algonquinlive.com',$subject,$txt_prof,$headers);
	//$b = mail('bhatth@algonquincollege.com', $subject, $txt_stud,$headers);
	
	echo $a;
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
<body onload="afterlogout()">
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


   <div>

		<h1>Algonquin Appointment Book Kiosk</h1>

		<div class="sent">
		<p>
			Your request for appointment with professor has been sent successfully. <br/>
			Your professor will contact you to your algonquin-live email account in 24 hours.
			
		</p>
    </div>
</div>


    <?php include 'footer.php'; ?>

</body>
</html>