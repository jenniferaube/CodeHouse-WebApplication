<!--
File: admin.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 19, 2018 by Jennifer Aube
-->
<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

    $session = new Session();
    /*$session->blockPage();
    $session->blockStudent();
    $session->blockProfessor();
    $session->logoutUser();*/
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
    <link rel="stylesheet" type="text/css" href="assets/css/admin/style-admin.css">

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
                    <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/home.png"></a></li>
                </ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
                    <li><a><?php echo $_SESSION['userLogin']; ?></a></li>
                    <li id="mapIcon" class=""><a class="icon" href="/admin.php?logout=map"><img src="/assets/img/map.png"></a></li>
                    <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                    <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<h1>Welcome Administrator</h1>
    <div class="container-adminbuttons">
<!--        <div class="action" >-->
            <a href="adduser.php">
                <button id="add" class="btn btn-success" name="add">Add a User</button>
            </a>
<!--        </div>-->
<!--        <div class="action" >-->
            <a href="finduser.php">
                <button id="edit" class="btn btn-success" name="1" value="1" id="finduser" ">Edit a User</button>
            </a>
<!--        </div>-->
<!---->
<!--        <div class="action">-->
            <a href="finduser.php">
                <button class="btn btn-success" name="2" value="2" id="finduser" ">De-Activate a User</button>
            </a>
<!--        </div>-->
    </div>

    <?php include 'footer.php'; ?>
    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>
    <script src="assets/js/history.js"></script>
    <script src="assets/js/timeout.js"></script>
<script src="assets/js/searchresults.js"></script>

</body>
</html>