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

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/include/nav.php"; ?>

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

    <div></div>


</body>
</html>