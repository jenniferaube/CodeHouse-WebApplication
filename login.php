<!--File: style-footer.css-->
<!--Created by: Evandro Ramos-->
<!--Date: February 23, 2018-->
<!--Last modified: March 19, 2018 by Evandro Ramos-->
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/session.php";

    $session = new Session();
    $session->blockReLoggin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule</title>

    <!-- Jquery-UI@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Mottie Keyboard -->
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">

    <title>Keyboard</title>

</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" ><img src="/assets/img/ac-icon.png"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav"></ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
                    <li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>
                   <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Alert!</h4>

                    </div>
                    <div class="modal-body">
                        <p id="login-feedback"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="login-container">
            <form id="loginForm" method="post" novalidate>
                <div class="form-group">
                    <label for="keyboard-text">Email address</label>
                    <input type="email" name="login" class="form-control" id="keyboard-text" placeholder="Email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="keyboard-pwd">Password</label>
                    <input type="password" name="pass" class="form-control" id="keyboard-pwd" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success pull-right">Sign In</button>
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
    <script type="text/javascript" src="assets/js/keyboard-login.js"></script>
    <script src="assets/js/history.js"></script>
    <script src="assets/js/post.js"></script>
    <script src="assets/js/timeout.js"></script>


	<?php include 'footer.php'; ?>
</body>

</html>