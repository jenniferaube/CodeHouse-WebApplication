<?php
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

$session = new Session();
/*$session->blockPage();
$session->blockStudent();
$session->blockProfessor();
$session->logoutUser();*/
// above code is needed when admin needs to login directly to test code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>

    <!-- Jquery-UI@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Mottie Keyboard -->
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-deactivateuser.css">

</head>
<body>

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
                <li class=""><a class="icon" href="/admin.php"><img src="/assets/img/home.png"></a></li>
            </ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">
                <li><a><?php echo $_SESSION['userLogin']; ?></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/professor.php?logout=map"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<h2>*Are you sure you wish to de-activate this user</h2>

        <a href="admin.php"> <!--show a pop up confirming deactivation then return to main menu-->
            <button id="deactivate" class="btn btn-danger" onclick="snackbarFunction()">De-Activate

            </button></a>
<div id="snackbar" style="visibility:hidden;">You have successfully de-activated the user
</div>

        <a href="admin.php"><!--show a pop up confirming no changes were made and return the main menu-->
            <button class="btn btn-primary" onclick="snackbarFunction()">Cancel

            </button></a>
<div id="snackbar" style="visibility:hidden;">No changes were made
</div>
<script src="\assets\js\snackbar.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>