
<?php
/*
File: finduser.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 19, 2018 by Jennifer Aube
*/
/*the following code (ob_start()) was taking from https://github.com/skyronic/crudkit/issues/40
it fixes issues with the header warning*/
ob_start();
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/sql/connection.php";
$session = new Session();
/*$session->blockPage();
$session->blockStudent();
$session->blockProfessor();
$session->logoutUser();*/

$connection = Connection::getConnection();
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
    <link rel="stylesheet" type="text/css" href="assets/css/admin/style-finduser.css">

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
                    <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
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
                    <label for="keyboard-text">First Name: </label>
                    <input id="keyboard-fname" type="text" name="firstname">
                </div>
                <div class="form-group">
                    <label for="keyboard-text">Last Name: </label>
                    <input id="keyboard-lname" type="text" name="lastname">
                </div>
                <div class="form-group">
                    <label for="keyboard-text">Email: </label>
                    <input id="keyboard-email" type="email" name="email">
                </div>
                <div class="form-group">
                    <button id="searchbutton" class="btn btn-success btn-xs" type="submit">Search</button>
                </div>
                <div class="form-group">
                    <a href="admin.php">
                        <button id="cancelbutton" class="btn btn-success btn-xs" type="button">Cancel</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
<script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>

<!-- Jquery-UI@1.9.2 -->
<script type="text/javascript" src="resources/jquery-ui/js/jquery-ui.js"></script>

<!-- Mottie Keyboard -->
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.keyboard.js"></script>
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="resources/mottie-keyboard/js/jquery.keyboard.extension-typing.min.js"></script>

<!-- Bootstrap@3.3.7 -->
<script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>

<!-- Custom Javascript -->
<script type="text/javascript" src="./keyboard_finduser.js"></script>
<script src="assets/js/history.js"></script>
<script src="assets/js/post.js"></script>
<script src="assets/js/timeout.js"></script>
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
Connection::closeConnection($connection);
?>


<?php include 'footer.php'; ?>
</body>
</html>