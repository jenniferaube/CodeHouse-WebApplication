<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cancel-Message</title>

    <!-- Jquery-UI@1.9.2 -->
    <link rel="stylesheet" type="text/css" href="resources/jquery-ui/css/jquery-ui.css">
    <!-- Jquery@1.9.1 -->
    <script type="text/javascript" src="resources/jquery/js/jquery.min.js"></script>
    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">

    <!-- Mottie Keyboard -->
    <link rel="stylesheet" type="text/css" href="resources/mottie-keyboard/css/keyboard.css">

    <!-- Custom Style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style-map.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">

    <!-- Custom JS -->
    <script>
        function tohome() {
            setTimeout(function(){ window.location = './index.php'; }, 600000);  // every 10 mins, go back to the home page
        }

        function refresh() {
            setTimeout(function(){ window.location = './cancel_message.php'; }, 300000);  // refresh this page every 5 mins
        }
        tohome();
        refresh();
    </script>
</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/logged_out.php"><img src="/assets/img/ac-icon.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class=""><a class="icon" href="/student.php"><img src="/assets/img/home.png"></a></li>
            </ul>
            <ul id="menuRight" class="nav navbar-nav navbar-right">
                <li id="mapIcon" class=""><a class="icon" href="/student.php?logout=map"><img src="/assets/img/map.png"></a>
                </li>
                <!--<li class=""><a class="icon" href="#"><img src="assets/img/forward.png"></a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!--                            -->
<!--    Insert code here        -->
<!--                            -->
<!--                            -->

<div class="container" style="position: relative; margin-top: 100px; height: 600px; overflow: auto;">
    <div class="row text-center">
        <h1>Class Cancellation Announcement</h1>
        <ul>
            <?php
            $results = (new class_dao())->select_cancelled('0');
            date_default_timezone_set('America/Toronto');
            if (empty($results)) {
                echo '<li class="list-group-item">' . 'No Cancelled Class Today' . '<br/>';
                echo 'Have a Great Day' . '</li>';
            } else {
                $counter=0;
                foreach($results as $class){
                    $date_current = new DateTime();
                    $date_current->modify("-15 minutes");
                    $date_start = new DateTime($class[0]);
                    $class_start = (new DateTime($class[0]))->format("Y-m-d H:i");
                    $class_end = (new DateTime($class[1]))->format("Y-m-d H:i");
                    if($date_current < $date_start) {
                        echo '<li class="list-group-item text-left">'.'<strong>'.$class[3].$class[4].'-'.$class[5].'-'.$class[6].'</strong><br/>';
                        echo 'Scheduled on: '.$class_start.' to '.$class_end.'<br/>';
                        echo 'is cancelled today'.'</li>';
                    } else {
                        $counter++;
                    }
                    if ($counter == sizeof($results)) {
                        echo '<li class="list-group-item">' . 'No Cancelled Class Today' . '<br/>';
                        echo 'Have a Great Day' . '</li>';
                    }
                }
            }
            ?>
        </ul>
    </div>
</div>


<?php include 'footer.php'; ?>


</body>
</html>