<!--File: style-footer.css-->
<!--Created by: Evandro Ramos-->
<!--Date: February 23, 2018-->
<!--Last modified: March 19, 2018 by Evandro Ramos-->
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
                <a class="navbar-brand" href="/" ><img src="/assets/img/ac-icon.png"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                </ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
                    <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <h1>Welcome to Appointment Book Kiosk</h1>

    <div class="info-block">
        <h4>To request an appointment booking with any professor of your program click the link on the left and login with
            your network credentials.</h4>
    </div>


    <div class="container-actions">
        <div class="action">
            <a href="login.php">
                <h2>Book Appointment</h2>
                <img src="assets/img/schedule.png">
            </a>
        </div>


        <div class="action">
            <a href="map.php">
                <h2>Room Finder</h2>
                <img src="assets/img/search-map.png">
            </a>
        </div>
    </div>

    <?php include 'footer.php'; ?>


</body>
</html>