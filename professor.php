<<<<<<< HEAD
<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

    $session = new Session();
//    $session->blockPage();
//    $session->blockStudent();
//    $session->blockAdmin();
//    $session->logoutUser();

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
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">
    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>
<!--    <script src="assets/js/history.js"></script>-->
<!--    <script src="assets/js/timeout.js"></script>-->
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">

    <!-- Calendar Style  -->
    <link href='professor/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='professor/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <!-- Calendar JQuery  -->
    <script src='professor/js/moment.min.js'></script>
    <script src='professor/js/jquery.min.js'></script>
    <script src='professor/js/fullcalendar.min.js'></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                themeSystem: 'bootstrap3',
                defaultView: 'agendaWeek',
                allDaySlot: false,
                nowIndicator: true,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventStartEditable: false,
                eventDurationEditable: false,
                eventLimit: true, // allow "more" link when too many events
                eventColor: '#006341',
                eventTextColor: '#FFFFFF',
                events: {
                    url: 'initial_prof.php',
                    type: 'POST',
                    data: {
                        prof_id: 2
                    }
                },
                eventClick:function(event)
                {
                    if(event.color == '#006341'){
                        if(confirm("Are you sure to cancel?"))
                        {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url:"update_prof.php",
                                type:"POST",
                                data:{
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '0'
                                },
                                success:function()
                                {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Cancelled");
                                },
                                error:function(){
                                    alert("Error occurs");
                                }
                            })
                        }
                    } else {
                        if(confirm("Are you sure to restore?"))
                        {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url:"update_prof.php",
                                type:"POST",
                                data:{
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '1'
                                },
                                success:function()
                                {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Restored");
                                },
                                error:function(){
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
                    <li class=""><a class="icon" href="/professor.php"><img src="/assets/img/home.png"></a></li>
                </ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
<!--                    <li><a>--><?php //echo $_SESSION['userLogin']; ?><!--</a></li>-->
                    <li id="mapIcon" class=""><a class="icon" href="/professor.php?logout=map"><img src="/assets/img/map.png"></a></li>
                    <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                    <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <div id='calendar'></div>
<!--                            -->
<!--    Insert code here        -->
<!--                            -->
<!--                            -->
    <?php echo $_SESSION['userId']; ?>
    <?php include 'footer.php'; ?>


</body>
=======
<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

    $session = new Session();
//    $session->blockPage();
//    $session->blockStudent();
//    $session->blockAdmin();
//    $session->logoutUser();

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
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">
    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>
<!--    <script src="assets/js/history.js"></script>-->
<!--    <script src="assets/js/timeout.js"></script>-->
    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">

    <!-- Calendar Style  -->
    <link href='professor/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='professor/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <!-- Calendar JQuery  -->
    <script src='professor/js/moment.min.js'></script>
    <script src='professor/js/jquery.min.js'></script>
    <script src='professor/js/fullcalendar.min.js'></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                themeSystem: 'bootstrap3',
                defaultView: 'agendaWeek',
                allDaySlot: false,
                nowIndicator: true,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventStartEditable: false,
                eventDurationEditable: false,
                eventLimit: true, // allow "more" link when too many events
                eventColor: '#006341',
                eventTextColor: '#FFFFFF',
                events: {
                    url: 'initial_prof.php',
                    type: 'POST',
                    data: {
                        prof_id: 2
                    }
                },
                eventClick:function(event)
                {
                    if(event.color == '#006341'){
                        if(confirm("Are you sure to cancel?"))
                        {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url:"update_prof.php",
                                type:"POST",
                                data:{
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '0'
                                },
                                success:function()
                                {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Cancelled");
                                },
                                error:function(){
                                    alert("Error occurs");
                                }
                            })
                        }
                    } else {
                        if(confirm("Are you sure to restore?"))
                        {
                            var start_time = new Date(event.start).toISOString().slice(0, 19).replace('T', ' ');
                            var end_time = new Date(event.end).toISOString().slice(0, 19).replace('T', ' ');
                            $.ajax({
                                url:"update_prof.php",
                                type:"POST",
                                data:{
                                    id: event.id,
                                    start: start_time,
                                    end: end_time,
                                    status: '1'
                                },
                                success:function()
                                {
                                    $('#calendar').fullCalendar('refetchEvents');
                                    alert("Class Restored");
                                },
                                error:function(){
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
                    <li class=""><a class="icon" href="/professor.php"><img src="/assets/img/home.png"></a></li>
                </ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
<!--                    <li><a>--><?php //echo $_SESSION['userLogin']; ?><!--</a></li>-->
                    <li id="mapIcon" class=""><a class="icon" href="/professor.php?logout=map"><img src="/assets/img/map.png"></a></li>
                    <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                    <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <div id='calendar'></div>
<!--                            -->
<!--    Insert code here        -->
<!--                            -->
<!--                            -->
    <?php echo $_SESSION['userId']; ?>
    <?php include 'footer.php'; ?>


</body>
>>>>>>> 6ec8a85d6aa073b4de35f51897edd90ab3e7a185
</html>