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

</body>
</html>