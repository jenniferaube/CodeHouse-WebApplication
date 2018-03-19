<?php
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

$session = new Session();
/*$session->blockPage();
$session->blockStudent();
$session->blockProfessor();
$session->logoutUser();*/
// above code is needed when admin needs to login directly, commented to test code

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
    <link rel="stylesheet" type="text/css" href="/assets/css/admin/style-adduser.css">

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
                <li class=""><a class="icon" href="/professor.php"><img src="/assets/img/home.png"></a></li>
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

<form action="adduser.php" method="post">

<div class="container-form" style="padding-top: 100px;">

        <div class="form-group">
            <label>User Type:</label>
            <label><input type="checkbox" id="1" checked name="usertype" value="professor">Professor</label>
            <label><input type="checkbox" id="2" name="usertype" value="student">Student</label>
        </div>
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
            <input type="email" name="emailaddress">
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="password" name="passwrd">
        </div>
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="username">
        </div>
        <div class="form-group">

           <button class="btn-success" type="submit" >Add User
                </button>
        </div>
</div>

   </form>
<?php
$errors = false;
if(isset($_POST['usertype'])||isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['emailaddress'])||
    isset($_POST['passwrd'])||isset($_POST['username'])) {
    if($_POST['usertype'] == "professor"){
        $ut = 1;
    }
    if($_POST['usertype']=="student"){
        $ut = 2;
    }
    if($_POST['firstname']==""){
        $errors = true;
    }
    if($_POST['lastname']==""){
        $errors = true;
    }
    if($_POST['emailaddress']==""){
        $errors = true;
    }if($_POST['passwrd']==""){
        $errors = true;
    }
    if($_POST['username']==""){
        $errors = true;
    }
    if(!$errors) {
        $fn = $_POST['firstname'];
        $ln = $_POST['lastname'];
        $em = $_POST['emailaddress'];
        $pw = $_POST['passwrd'];
        $un = $_POST['username'];

        $sql = "insert into user values (default, '$fn', '$ln', '$em', '$pw', CURRENT_TIME, default, '$ut')";
        if ($connection->query($sql) === true) {
            echo "New record inserted";
            header("Location: successful-useradded.php");
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}

$connection->close();
?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>