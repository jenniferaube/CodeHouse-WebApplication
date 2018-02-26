<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/assets/class/session.php";

    $session = new Session();
    $session->blockPage();
    $session->logoutUser();
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
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">


</head>
<body>

    <?php include_once $_SERVER['DOCUMENT_ROOT']."/include/nav.php"; ?>

    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>

    <script src="assets/js/history.js"></script>
    <script src="assets/js/timeout.js"></script>

</body>
</html>