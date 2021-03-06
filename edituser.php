
<?php
/*the following code (ob_start()) was taking from https://github.com/skyronic/crudkit/issues/40
it fixes issues with the header warning*/
ob_start();
/*
File: edituser.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: April 04, 2018 by Jennifer Aube
*/
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/sql/connection.php";

$session = new Session();
$session->blockPage();
$session->blockStudent();
$session->blockProfessor();
$session->logoutUser();

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
    <link rel="stylesheet" type="text/css" href="assets/css/admin/style-edituser.css">

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
                <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container-form" >

    <form action="edituser.php" method="post">
        <div id="editing">
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";
            $id = $_SESSION["id"];
            $sql = "select * from user where id = $id";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <div class="form-group">
                <label for="keyboard-fname">First Name: </label>
                <input id="keyboard-fname" name="firstname" type="text" value="<?php echo $row["first_name"]; ?>">
            </div>
            <div class="form-group">
                <label for="keyboard-lname">Last Name: </label>
                <input id="keyboard-lname" name="lastname" type="text" value="<?php echo $row["last_name"]; ?>">
            </div>
            <div class="form-group">
                <label for="keyboard-email">Email: </label>
                <input id="keyboard-email" name="email" type="email" value="<?php echo $row["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="keyboard-pwd">Password: </label>
                <input id="keyboard-pwd" name="password" type="password">
            </div>
            <div class="form-group">
                <label for="keyboard-confirmpwd">Re-enter Password: </label>
                <input id="keyboard-confirmpwd" name="confirm-password" type="password">
            </div>
            <div class="form-group">
                <button id="editingbutton" class="btn btn-success btn-xs" type="submit" onclick="snackbarFunction()">Save Changes</button>
            </div>
            <div class="form-group">
                <a href="admin.php">
                    <button id="cancelbutton" class="btn btn-success btn-xs" type="button" onclick="snackbar()">Cancel</button>
                </a>
            </div>

            <div id="snackbar">No changes were made</div>
            <script src="assets/js/snackbar.js"></script>
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
<script type="text/javascript" src="./keyboard_edituser.js"></script>
<script src="assets/js/history.js"></script>
<script src="assets/js/post.js"></script>
<script src="assets/js/timeout.js"></script>
<?php
$changes = false;

if(isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['email'])||
    isset($_POST['password'])) {
    $fn = $_POST["firstname"];
    $ln = $_POST["lastname"];
    $em = $_POST["email"];
    //$sql = "update user set first_name = '$fn', last_name = '$ln', email = '$em' where id = $id";
    if($_POST['password'] != ""){
        if($_POST['password'] == $_POST['confirm-password']){
            $pw = $_POST["password"];
            $pass = Bcrypt::hash($pw);
            $sql = "update user set first_name = '$fn', last_name = '$ln', email = '$em', password = '$pass' where id = $id";
        }
        else{
           alert("Both password do not match");
        }
    }
    else {
        $sql = "update user set first_name = '$fn', last_name = '$ln', email = '$em' where id = $id";
    }
    $result = $connection->query($sql);
    if ($connection->query($sql) === true) {
         header("Location: successful.php?success=2");
    } else {
        alert("Error, user has not been changed");
    }


}
function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
Connection::closeConnection($connection);
?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>