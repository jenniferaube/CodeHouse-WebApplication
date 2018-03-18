<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schedule</title>

    <!-- Bootstrap@3.3.7 -->
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">


    <!-- Custom Style -->
	<link rel="stlesheet" type="text/css" href="assets/css/style-messagesent.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-index.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-navbar.css">
	

</head>
<body onload="afterlogout()">
	<!-- Custom Javascript -->
	<script src="assets/js/timeout.js"></script>

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
                <ul class="nav navbar-nav">
                </ul>
                <ul id="menuRight" class="nav navbar-nav navbar-right">
                    <li id="mapIcon" class=""><a class="icon" href="/map.php"><img src="/assets/img/map.png"></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>



   <div>

		<h1>Algonquin Appointment Book Kiosk</h1>

		<div class="sent">
		<p>
			Your request for appointment with professor has been sent successfully. <br/>
			Your professor will contact you to your algonquin-live email account in 24 hours.
		</p>
    </div>
</div>


    <?php include 'footer.php'; ?>

</body>
</html>