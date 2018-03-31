<!--
File: edituser.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 31, 2018 by Jennifer Aube
-->
<?php
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
    <link rel="stylesheet" type="text/css" href="./style-edituser.css">

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
                <li><a></a></li>
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
                <label>First Name: </label>
                <input name="firstname" type="text" value="<?php echo $row["first_name"]; ?>">
            </div>
            <div class="form-group">
                <label>Last Name: </label>
                <input name="lastname" type="text" value="<?php echo $row["last_name"]; ?>">
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input name="email" type="email" value="<?php echo $row["email"]; ?>">
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input name="password" type="password">
            </div>
            <div class="form-group">
                <label>Re-enter Password: </label>
                <input name="password" type="password">
            </div>
            <div class="form-group">
                <button id="editingbutton" class="btn-success" type="submit" onclick="snackbarFunction()">Save Changes</button>
            </div>
            <div class="form-group">
                <a href="admin.php">
                    <button id="cancelbutton" class="btn-success" type="button" onclick="snackbar()">Cancel</button>
                </a>
            </div>

            <div id="snackbar">No changes were made</div>
            <script src="./snackbar.js"></script>
</div>
    </form>
</div>

<?php
$changes = false;

if(isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['email'])||
    isset($_POST['password'])) {
    $fn = $_POST["firstname"];
    $ln = $_POST["lastname"];
    $em = $_POST["email"];
    if(isset($_POST['password']) != ""){
        $pw = $_POST["password"];
        $pass = Bcrypt::hash($pw);
        $sql = "update user set first_name = '$fn', last_name = '$ln', email = '$em', password = '$pass' where id = $id";
    }
    else {
        $sql = "update user set first_name = '$fn', last_name = '$ln', email = '$em' where id = $id";
    }
    $result = $connection->query($sql);
    if ($connection->query($sql) === true) {
         header("Location: successful.php?success=2");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
Connection::closeConnection($connection);
?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>