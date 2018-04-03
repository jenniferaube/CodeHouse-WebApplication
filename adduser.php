
<?php
ob_start();
/*
File: adduser.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 31, 2018 by Jennifer Aube
 */
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";
include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/lib/bcrypt.php";

$session = new Session();
$session->blockPage();
$session->blockStudent();
$session->blockProfessor();
$session->logoutUser();

$connection = Connection::getConnection();
if($connection->connect_error){
    die("Connection failed: ". $connection->connect_error);
}
include_once $_SERVER['DOCUMENT_ROOT'] . "/users/dao/user_dao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/users/dto/user_dto.php";

if (isset($_POST['uploadbutton'])) {
    $save_dir = "./file_upload/files/";
    $filename = explode(".", $_FILES["upload_users"]["name"]);
    $new_file_name = $_FILES["upload_users"]["name"];
    if (is_uploaded_file($_FILES["upload_users"]["tmp_name"])) {
        $dest = $save_dir . $new_file_name;
        if (move_uploaded_file($_FILES["upload_users"]["tmp_name"], $dest)) {
            echo "<script language='javascript'>";
            echo 'if(alert("Success to upload")){';
            echo 'window.location.reload();}'; //reload page
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
    $file_address = "./file_upload/files/".$_FILES['upload_users']['name'];
    $file = fopen($file_address, "r");
    while (!feof($file)) {
        $user = new user_dto();
        $row = fgetcsv($file);
        if($row[0]=='Std_fname'){
            continue;
        } else {
            $user->setUserFirstname($row[0]);
            $user->setUserLastname($row[1]);
            $user->setUserEmail($row[2]);
            $user->setUserPassword($row[3]);
            $user->setUserCreated(date('YmdHis'));
            (new user_dao())->insert_users($user);
        }
    }
    fclose($file);
    echo "<script language='javascript'>";
    echo 'if(alert("Success to update")){';
    echo 'window.location.reload();}';
    echo "</script>";
}
?>
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
    <link rel="stylesheet" type="text/css" href="assets/css/admin/style-adduser.css">

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
                <li><a><?php echo $_SESSION['userLogin'] ?></a></li>
                <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
                <li class=""><a class="icon" href="/logged_out.php"><img src="/assets/img/off.png"></a></li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<script src="/assets/class/lib/bcrypt.php"></script>
<div class="container-formadduser">
    <div id="addingusers">
        <form action="adduser.php" method="post">
<div class="addoneuser">
            <div class="checkbox-parent">
                <label>User Type:</label>
                <label><input type="radio" id="1" data-toggle="toggle" checked name="usertype" value="professor" >Professor</label>
                <label><input type="radio" id="2" data-toggle="toggle" name="usertype" value="student" >Student</label>
            </div>
            <div class="form-group">
                <label for="keyboard-text">First Name: </label>
                <input id="keyboard-fname" class="form" type="text" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="keyboard-text">Last Name: </label>
                <input id="keyboard-lname" class="form" type="text" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="keyboard-text">Email: </label>
                <input id="keyboard-email" class="form" type="email" name="emailaddress" required>
            </div>
            <div class="form-group">
                <label for="keyboard-text">Re-enter Email: </label>
                <input id="keyboard-confirmemail" class="form" type="email" name="confirm_email" required>
            </div>
            <div class="form-group">
                <label for="keyboard-pwd">Password: </label>
                <input id="keyboard-pwd" class="form" type="password" name="passwrd" required>
            </div>
            <div class="form-group">
                <label for="keyboard-pwd">Re-enter Password: </label>
                <input id="keyboard-confirmpwd" class="form" type="password" name="confirm_password" id="confirm_password" required>
            </div>
            <div class="form-group">
                <a href="admin.php">
                    <button id="cancelbutton" class="btn btn-success btn-xs" type="button" >Cancel</button>
                </a>
            </div>
            <div class="form-group">
                <a href="successful.php?success=1">
                    <button id="addingbutton" class="btn btn-success btn-xs" type="submit">Add User</button>
                </a>
            </div>

            <?php
            $errors = false;
            if(isset($_POST['usertype'])||isset($_POST['firstname'])||isset($_POST['lastname'])||isset($_POST['emailaddress'])||
                isset($_POST['passwrd'])) {
                if(isset($_POST['usertype']) == "professor"){
                    $ut = 1;
                }
                if(isset($_POST['usertype'])=="student"){
                    $ut = 2;
                }
                if(isset($_POST['firstname'])==""){
                    $errors = true;
                }
                if(isset($_POST['lastname'])==""){
                    $errors = true;
                }
                if(isset($_POST['emailaddress'])==""){
                    $errors = true;
                }
                if(isset($_POST['passwrd'])==""){
                    $errors = true;
                }
                if($_POST['emailaddress'] != $_POST['confirm_email']){
                    echo alert("Your email address's did not match.");
                    exit();
                }
                if($_POST['passwrd'] != $_POST['confirm_password']){
                    echo alert("Your password's did not match.");
                    exit();
                }
                if(!$errors && $_POST['passwrd'] == $_POST['confirm_password'] && $_POST['emailaddress'] == $_POST['confirm_email'] ) {
                    $fn = $_POST['firstname'];
                    $ln = $_POST['lastname'];
                    $em = $_POST['emailaddress'];
                    $pw = $_POST['passwrd'];
                    $pass = Bcrypt::hash($pw);

                    $sql = "insert into user values (default, '$fn', '$ln', '$em', '$pass', CURRENT_TIME, default, '$ut')";

                    if ($connection->query($sql) === true) {
                        header("Location: successful.php?success=1"); //doesnt work
                        //alert("User has been added");
                    } else {
                        alert("Database error: User was not added to database");
                    }
                }
            }
            function alert($msg) {
                echo '<script type="text/javascript">alert("' . $msg . '")</script>';
            }

            ?>
            <!--following script modified from file_upload.php-->
            <script>
                $(document).ready(function () {
                    $('#upload_users').change(
                        function () {
                            //for testing, allow csv file to be validated
                            var fileExtension = ['csv'];
                            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) { //check file extension
                                alert("Please choose a CSV file.");
                                $('#uploadbutton').attr("disabled", true);
                            }
                            else {
                                $('#upload_users').attr("disabled", false);
                                $('#uploadbutton').attr("disabled", false);
                            }
                        })

                });
                function goBack() {
                    window.history.back();
                }
            </script>
</div>
        </form>
        <form method="post" enctype="multipart/form-data" action="">
        <div id="uploadingusers" >
            <div id="uploading">
                <form action="upload.php" id="upload_form" method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>">
                    <input type="file" name="upload_users" id="upload_users" placeholder="Choose file">
                </form>
            </div>

            <button id="uploadbutton" name="uploadbutton" class="btn btn-success btn-xs" type="submit">Upload File</button>

        </div>
        </form>
    </div>
</div>
<!-- Jquery@1.9.1 -->
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
<script type="text/javascript" src="assets/js/keyboard_adduser.js"></script>
<script src="assets/js/history.js"></script>
<script src="assets/js/post.js"></script>
<script src="assets/js/timeout.js"></script>
<?php

Connection::closeConnection($connection);
include 'footer.php'; ?>
</body>
</html>