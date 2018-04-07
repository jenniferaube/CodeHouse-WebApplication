
<?php
/*
File: deactivateuser.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 31, 2018 by Jennifer Aube
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
    <link rel="stylesheet" type="text/css" href="assets/css/admin/style-deactivateuser.css">


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
                <li id="mapIcon" class=""><a class="icon" href="/admin.php?logout=map"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<h1 id="header">*Are you sure you wish to de-activate this user</h1>
<?php
$id = $_SESSION["id"];
$sql = "select first_name, last_name, email from user where id = $id";
$sql = "select * from user where id = $id";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
?>
<div id="deactivateuser">
<form method="post" action="deactivateuser.php">
<p id="userinfo"><?php echo $row["first_name"]?>  <?php echo $row["last_name"]?>, <?php echo $row["email"]?></p>
<div id="deactivatebuttons">

    <a href="admin.php">
        <button name="deactivate" type="submit" id="deactivate" class="btn btn-danger">De-Activate
        </button></a>



<a href="admin.php">
    <button class="btn btn-primary" type="button" onclick="snackbar()">Cancel</button></a>

<div id="snackbar">No changes were made</div>
    <script src="assets/js/snackbar.js"></script>
</div>
</form>
</div>
<?php
if(isset($_POST["deactivate"])){
    $sql = "update user set activated = '0' where id = $id";
    $result = $connection->query($sql);
    if ($connection->query($sql) === true) {
       header("Location: successful.php?success=0");
    }
    else {
        alert("Database error: user was not deactivated");
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