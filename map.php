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

    <div id="outputSearch">Search for your room bellow</div>

    <div id="mapContainer">
        <iframe id="map" src="resources/map/map.html" frameborder="0" scrolling="no"></iframe>
    </div>



    <div class="container">
        <div class="search-container">
            <div class="form-group">
                <input type="email" class="form-control" id="keyboard-text" placeholder="Room #">
            </div>
            <button id="search" type="submit" class="btn btn-success">Search Map</button>
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

    <!-- Custom Javascript -->
    <script type="text/javascript" src="assets/js/keyboard-login.js"></script>
    <script src="assets/js/history.js"></script>
    <script src="assets/js/timeout.js"></script>

    <script>
        $(function(){
            $("#search").click(function () {
                $("#map").contents().find("#searchBox").val($("#keyboard-text").val());
                $("#map").contents().find("#searchButton").click();
                setTimeout(function(){
                    var result = $("#map").contents().find("#buildingLabel").html().replace(/&nbsp;/g, " ").replace("..", "");
                    $("#outputSearch").html(result);
                }, 500);

            });
        });
    </script>

    <script src="assets/js/history.js"></script>

</body>
</html>