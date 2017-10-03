<!DOCTYPE HTML>
<!--
	Identity by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Identity by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">


<?php
$server="localhost";
		$unm="root";
		$pwd="dbpass";
		$db="angel";

		$con=new mysqli($server,$unm,$pwd,$db);
      if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
	$qrysel="SELECT name FROM gmaps WHERE ID = '1'";
	
$result = mysqli_query($con, $qrysel);
if (mysqli_num_rows($result) == 0) {
	echo "sorry";}
	else{
	while($row = mysqli_fetch_assoc($result)) {
        
     $i = $row['name'];
     
     echo ":::::"."<b>".$i."</b>:::::";
     }
     }
     ?>
				<!-- Main -->
					<section id="main" style="min-width: 47em">
						<header>
						</header>
						

						<hr />
						<form method="post" action="#">
							<div class="field">
							</div>
							<div class="field">
							</div>
							<div class="field">
								<div class="select-wrapper">
									
								</div>
							</div>
							<div class="field">

							</div>
							<div class="field">
								<input type="checkbox" id="human" name="human" /><label for="human">I'm a human</label>
							</div>
							<div class="field">
								<label>But are you a robot?</label>
								<input type="radio" id="robot_yes" name="robot" /><label for="robot_yes">Yes</label>
								<input type="radio" id="robot_no" name="robot" /><label for="robot_no">No</label>
							</div>
							<ul class="actions">
								<li><a href="phpchat/examples/theme_carbon.php" class="button">Get Started</a></li>
							</ul> 
						</form>
						<hr /> 
				
						<footer>
						</footer>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							
						</ul>
					</footer>

			</div>

			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>