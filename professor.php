<?php
/*
 * File: professor.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/session.php";
/*
 * Create a session for the logged-in prof
 * If session is incomplete, block page by using blockPage()
 * Prevent page redirect to other user page by using blockProfessor()
 */
$session = new Session();
/*$session->blockPage();
$session->blockStudent();
$session->blockAdmin();
$session->logoutUser();*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professor</title>

    <!-- Jquery-UI@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Mottie Keyboard -->
<!--    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">-->

    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/jquery-ui/js/jquery-ui.min.js"></script>
    <script src="assets/js/history.js"></script>
    <script src="assets/js/timeout.js"></script>

    <!-- Bootstrap@3.3.7 -->
    <script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">

    <!-- Calendar Style  -->
    <link href='professor/css/fullcalendar.min.css' rel='stylesheet'/>
    <link href='professor/css/fullcalendar.print.min.css' rel='stylesheet' media='print'/>

    <!-- Calendar JQuery  -->
    <script src='professor/js/moment.min.js'></script>
    <script src='professor/js/jquery.min.js'></script>
    <script src='professor/js/fullcalendar.min.js'></script>
    
    <!--
    The calendar below implements the open source API called full calendar, this AIP referenced as follows:
    FullCalendar [Online]. Available: https://fullcalendar.io/.
    -->
    <script>
        $(document).ready(function () {
            //Initialize the calendar
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today', //prev-btn, next-btn, today button
                    center: 'title', // enable title, position in the center
                    right: 'month,agendaWeek,agendaDay' // month-btn, week-btn, day-btn
                },
                themeSystem: 'bootstrap3',
                defaultView: 'agendaWeek', // default layout
                allDaySlot: false, // disable the all day slot
                nowIndicator: true, // enable current time indicator
                navLinks: true, // can click day/week names to navigate views
                editable: false, //event can not be editable
                eventStartEditable: false,
                eventDurationEditable: false,
                eventLimit: true, // allow "more" link when too many events
                eventColor: '#006341',
                eventTextColor: '#FFFFFF',
                events: {
                    url: 'initial_prof.php', //JSON feed php file
                    type: 'POST',
                    data: {
                        prof_id: <?php echo $_SESSION['userId']; ?>
                    }
                },
                eventClick: function (event) {
                    //#006341: normal class background color, #43B02A: office hour background color
                    if (event.color == '#006341' || event.color == '#43B02A') {
                        if (confirm("Are you sure to cancel?")) {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url: "update_prof.php", //Ajax target php file
                                type: "POST",
                                data: {
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '0'
                                },
                                success: function () {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Cancelled");
                                },
                                error: function () {
                                    alert("Error occurs");
                                }
                            })
                        }
                    } else {
                        if (confirm("Are you sure to restore?")) {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url: "update_prof.php",
                                type: "POST",
                                data: {
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '1'
                                },
                                success: function () {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Restored");
                                },
                                error: function () {
                                    alert("Error occurs");
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
    <style>
        #calendar {
            position: relative;
            padding: 0;
            font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
            font-size: 14px;
            max-width: 900px;
            margin: 80px auto;
        }
    </style>

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
            <a class="navbar-brand" href="/logged_out.php"><img src="/assets/img/ac-icon.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a class="icon" href="/professor.php"><img src="/assets/img/home.png"></a></li>
            </ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">
                <li><a><?php echo $_SESSION['userLogin']; ?></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/professor.php?logout=map"><img
                                src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>



<div class="pull-right" style="position: relative;margin-right: 80px;">
    <div class="row">
        <button id="btn_upload_file" style="color:#FFF; background-color: #006341;">Upload Schedule File</button>
    </div>
    <div class="row">
        <br/>
        <button id="btn_update_class" style="color:#FFF; background-color: #006341;">Update Schedule</button>
    </div>
</div>
<script>
    $("#btn_upload_file").click(function () {
        window.location = './file_upload.php';
    });
    $("#btn_update_class").click(function () {
        window.location = './prof_update_class.php';
    });
</script>
<div id='calendar'></div>
<!--                            -->
<!--    Insert code here        -->
<!--                            -->
<!--                            -->
<?php //echo $_SESSION['userId']; ?>
<?php include 'footer.php'; ?>

</body>
</html>
