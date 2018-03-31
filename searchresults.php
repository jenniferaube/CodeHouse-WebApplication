/**
File: searchresults.php
Created by: Jennifer Aube
Date: March 10, 2018
Last modified: March 19, 2018 by Jennifer Aube
*/
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
    <link rel="stylesheet" type="text/css" href="./style-searchresults.css">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" style="margin-bottom: 100px;">
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

<div class="form2" id="searchTable">
    <p>Search results...</p>
    <?php
    $fn = $_SESSION['firstname'];
    $ln = $_SESSION['lastname'];
    $em = $_SESSION['email'];

    if (!$_SESSION['firstname'] == "") {
        $fn = $_SESSION['firstname'];
        $sql = "select * from user where first_name like '%$fn%'";

    }
    if (!$_SESSION['lastname'] == "") {
        $ln = $_POST['lastname'];
        $sql = "select * from user where last_name like '%$ln%'";
    }
    if (!$_SESSION['email'] == "") {
        $em = $_POST['emailaddress'];
        $sql = "select * from user where email like '%$em'";
    }
    ?>

    <table class="table table-hover" id="table" onclick="rowClicked()">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Created</th>
            <th>Active</th>
            <th>Usertype</th>
        </tr>
        </thead>
        <tr onclick="rowClicked()">

<?php
                $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $_SESSION['id'] = $row["id"];
                            ?>

                            <td><?php echo $row["first_name"] ?></td>
                            <td><?php echo $row["last_name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["created"] ?></td>
                            <td><?php if ($row["activated"] == 0) {
                                    echo "de-activated";
                                }
                                if ($row["activated"] == 1) {
                                    echo "active";
                                }
                                ?></td>
                            <td><?php
                                if ($row["type"] == 0) {
                                    echo "admin";
                                }
                                if ($row["type"] == 1) {
                                    echo "professor";
                                }
                                if ($row["type"] == 2) {
                                    echo "student";
                                } ?></td>
                            <td><a href="edituser.php">
                                    <button onclick="editClicked()">Edit user</button>
                                </a></td></td>
                            <td><a href="deactivateuser.php">
                                    <button onclick="deactivateClicked()">Deactivate user</button>
                                </a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
                ?>



    </table>

</div>

<script src="assets/js/searchresults.js"></script>

<?php
Connection::closeConnection($connection);
include 'footer.php'; ?>
</body>
</html>
