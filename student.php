<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 3/31/2018
 * Time: 10:45 PM
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

    <!-- bootstrap-datepicker
    <link rel="stylesheet" type="text/css" href="resources/bootstrap-datepicker/css/bootstrap-datepicker.css">-->

    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">

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

            <p class="lead">Please select the professor you wish to contact.</p>

            <form id="contact-form" method="post" action="student_selecttime.php" role="form">

                <div class="messages"></div>

                <div class="controls">
				<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_prof">Professor *</label>
                                    <select id="form_prof" name="form_prof" class="form-control form-control-lg" required="required" data-error="Professor must exist.">
                                        <option value="" selected disabled>Choose Professor</option>
                                    <?php
//                                    Created by: Hiral Nilesh Bhatt
//                                    Date: March 31, 2018
//                                    Last modified: April 2, 2018 by Hiral Nilesh Bhatt
                                    $conn = Connection::getConnection();
                                    $student = $_SESSION['userLogin'];
									
                                    $sql = "select distinct concat(u.first_name , u.last_name) as 'Name' , u.email as 'email', u.id as 'PROFID'  
										from user u, professor p where u.type='1' and u.id  in 
										(select prof_id from course where program_id in
										(select p.program_id from student s, program p where 
										student_id in (select id from user where email like '$student') 
										and s.program_id = p.program_id));";
                                    $result = mysqli_query($conn, $sql);
                                    while($row =  mysqli_fetch_array($result)) {
                                        echo "<option  value='{$row['PROFID']}'>"; echo $row['Name']; ?> - <?php echo $row['email'];  echo "</option>"?>
                                    <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                        </div>
					<p class="lead">Please select an available date, within 5 days, minimum 24 hours notice.</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="datetimepicker">Date *</label>
                                    <input type='text' id='datetimepicker' name="datetimepicker" class="form-control input-lg" required="required" placeholder="Select a Date"
                                           data-error="A date must be selected."/>
<!--                                Created by: Hiral Nilesh Bhatt-->
<!--                                Date: March 31, 2018-->
<!--                                Last modified: April 2, 2018 by Hiral Nilesh Bhatt-->
                                <script type="text/javascript">
                                    $(function () {
										var date = new Date();
										date.setDate(date.getDate() + 1);
										var date1 = new Date();
										date1.setDate(date.getDate() + 4);
                                        $('#datetimepicker').datetimepicker({
                                            daysOfWeekDisabled: [0,6],
                                            format: 'L',
                                            defaultDate: "",
											'minDate': date,
											'maxDate': date1
											
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

</body>
