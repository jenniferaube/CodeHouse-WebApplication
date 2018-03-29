<!--
File: adduser.php
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
    <link rel="stylesheet" type="text/css" href="./style-adduser.css">

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
                <li id="mapIcon" class=""><a class="icon" href="/adduser.php?logout=map"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/assets/js/passwordcheck.js"></script>


<div class="container-formadduser">
    <div id="addingusers">
    <form action="adduser.php" method="post">

            <div class="checkbox-parent">
                <label>User Type:</label>
                <label><input type="radio" id="1" data-toggle="toggle" checked name="usertype" value="professor" >Professor</label>
                <label><input type="radio" id="2" data-toggle="toggle" name="usertype" value="student" >Student</label>
            </div>
            <div class="form-group">
                <label>First Name: </label>
                <input id="form" type="text" name="firstname" required>
            </div>
            <div class="form-group">
                <label>Last Name: </label>
                <input id="form" type="text" name="lastname" required>
            </div>
            <div class="form-group">
                <label>Email: </label>
                <input id="form" type="email" name="emailaddress" required>
            </div>
            <div class="form-group">
                <label>Re-enter Email: </label>
                <input id="form" type="email" name="emailaddress" required>
            </div>
            <div class="form-group">
                <label>Password: </label>
                <input id="form" type="password" name="passwrd" required>
            </div>
            <div class="form-group">
                <label>Re-enter Password: </label>
                <input id="form" type="password" name="confirm_password" id="confirm_password" onkeyup='check()' required>
                <span id='message'></span>
            </div>
        <div class="form-group">
            <a href="admin.php">
                <button id="cancelbutton" class="btn-success" type="button" >Cancel</button>
            </a>
        </div>
            <div class="form-group">
                <button id="addingbutton" class="btn-success" type="submit" >Add User</button>
            </div>


        </form>
        <div id="uploadingusers" >
            <div id="uploading">
                <form action="upload.php" id="upload_form" method="post" enctype="multipart/form-data">
                        <input type="file" name="upload_users"  id="upload_users" placeholder="Choose file">
                </form>
            </div>
            <button id="uploadbutton" name="uploadbutton" class="btn-success" type="submit">Upload File</button>
            <?php
            if (isset($_POST['uploadbutton'])) {
                $save_dir = "./file_upload/files/";
                date_default_timezone_set('America/Toronto');
                $temp = explode(".", $_FILES["upload_users"]["name"]);
                $extension = end($temp);
                $date = date('YmdHis');
                $new_file_name = $date . '.' . $extension;
                if (is_uploaded_file($_FILES["upload_users"]["tmp_name"])) {
                    $dest = $save_dir . $new_file_name;
                    if (move_uploaded_file($_FILES["upload_users"]["tmp_name"], $dest)) {
                        echo "<script language='javascript'>";
                        echo 'if(alert("Success to upload")){';
                        echo 'window.location.reload();}';
                        echo "</script>";
                    } else {
                        echo "<script language='javascript'>";
                        echo 'if(alert("Fail to upload")){';
                        echo 'window.location.reload();}';
                        echo "</script>";
                    }
                } else {
                    echo "fail1";
                }
            }
            ?>
        </div>
</div>
</div>

<?php
$errors = false;
if(isset($_POST['usertype'])||isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['emailaddress'])||
    isset($_POST['passwrd'])) {
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

    if(!$errors) {
        $fn = $_POST['firstname'];
        $ln = $_POST['lastname'];
        $em = $_POST['emailaddress'];
        $pw = $_POST['passwrd'];

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