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
    <link rel="stylesheet" type="text/css" href="assets/css/style-finduser.css">

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
<div class="container-formtable" >

    <form id="searchForm" method="post" >
        <p>Use any one or many fields to search for a user</p>

        <div class="form-group">
            <label>Username: </label>
            <input type="text" >
        </div>
        <div class="form-group">
            <label>First Name: </label>
            <input type="text" >
        </div>
        <div class="form-group">
            <label>Last Name: </label>
            <input type="text" >
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" >
        </div>
        <div class="form-group">
            <button class="btn-success" type="submit" onClick="displaySearchResults()" id="displaySearchResults">Find User</button>
        </div>

    </form>
    <script src="assets/js/searchresults.js"></script>

    <div class="form2" id="searchTable">
        <p>Search results...</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>UserName</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Usertype</th>
            </tr>
            </thead>


        </table>
    </div>
</div>


<?php include 'footer.php'; ?>
</body>
</html>