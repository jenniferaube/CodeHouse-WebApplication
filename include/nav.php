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
            <a class="navbar-brand" href="/student.php?logout=logged_out" ><img src="assets/img/ac-icon.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php

                $fileName = basename($_SERVER['PHP_SELF']);

                switch ($fileName) {
                    case "professor.html":
                        echo '<li class=""><a class="icon" href="#"><img src="assets/img/home.png"></a></li>';
                        break;
                    case "student.php":
                        echo '<li class=""><a class="icon" href="#"><img src="assets/img/home.png"></a></li>';
                        break;
                }
                ?>

            </ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">

                <?php

                switch ($fileName) {
                    case "index.php":
                        echo '<li id="mapIcon" class=""><a class="icon" href="map.php"><img src="assets/img/map.png"></a></li>';
                        break;
                    case "login.php":
                        echo '<li id="mapIcon" class=""><a class="icon" href="map.php"><img src="assets/img/map.png"></a></li>';
                        echo '<li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>';
                        break;
                    case "map.php":
                        echo '<li id="mapIcon" class=""><a class="icon" href="map.php"><img src="assets/img/map.png"></a></li>';
                        echo '<li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>';
                        break;
                    case "student.php":
                        echo "<li><a>{$_SESSION['userLogin']}</a></li>";
                        echo '<li id="mapIcon" class=""><a class="icon" href="/student.php?logout=map"><img src="assets/img/map.png"></a></li>';
//                        echo '<li class=""><a class="icon" onclick="goBack()"><img src="assets/img/back.png"></a></li>';
//                        echo '<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>';
                        echo '<li class=""><a class="icon" href="/student.php?logout=logged_out"><img src="assets/img/off.png"></a></li>';
                        break;
                    case "logged_out.php":
                        echo '<li id="mapIcon" class=""><a class="icon" href="/student.php?logout=map"><img src="assets/img/map.png"></a></li>';
                        break;

                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>