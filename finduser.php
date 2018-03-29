<!--
File: finduser.php
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


$servername = "localhost";
$username = "root";
$password = "algonquin";
$databasename = "codehouse";

$connection = new mysqli($servername, $username, $password, $databasename);
if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error);
}
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
    <link rel="stylesheet" type="text/css" href="./style-finduser.css">

</head>
<div>
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
                    <li id="mapIcon" class=""><a class="icon" href="/admin.php?logout=map"><img src="/assets/img/map.png"></a></li>
                    <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                    <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</div>
    <p>Use any one or many fields to search for a user</p>
    <div id="findusers">
        <form id="searchForm" method="post" action="finduser.php">
            <div id="findusers-form">
                <div class="form-group">
                    <label>First Name: </label>
                    <input type="text" name="firstname">
                </div>
                <div class="form-group">
                    <label>Last Name: </label>
                    <input type="text" name="lastname">
                </div>
                <div class="form-group">
                    <label>Email: </label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <button id="searchbutton" class="btn-success" type="submit">Search</button>
                </div>
                <div class="form-group">
                    <a href="admin.php">
                        <button id="cancelbutton" class="btn-success" type="button">Cancel</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
<?php
$errors = false;
if(isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['email'])) {
    if ($_POST['firstname'] == "" && $_POST['lastname'] == "" && $_POST['email'] == "") {
        $errors = true;
    }
    if (!$errors) {
        $fn = $_POST['firstname'];
        $ln = $_POST['lastname'];
        $em = $_POST['email'];
        $_SESSION['firstname'] = $fn;
        $_SESSION['lastname'] = $ln;
        $_SESSION['email'] = $em;
        header("Location: searchresults.php");
    }
    if ($errors) {
        echo alert("Fill in at least one item to search for");
    }
}
function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>


<?php include 'footer.php'; ?>
</body>
</html>