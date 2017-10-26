<?php
session_start();
?>
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

				<!-- Main -->
					<section id="main" style="min-width: 47em">

						<header>
							<span class="avatar"><img src="https://tracker.moodle.org/secure/useravatar?size=small&avatarId=17388" width="125px" height="125px" />
                                <!--https://jira.hyperledger.org/secure/useravatar?size=xsmall&avatarId=10341-->
                            <h3 style="font-weight: bold;margin-top: 10px;"><?php echo $_SESSION["username"]; ?></h3>
                            </span>
						</header>
						<!--
							
						
						<hr /> -->

						<div id="mapCanvas" style="width:100%;height:500px"></div>
						<footer>
							<ul class="icons">
						<!--		<li><a href="#" class="fa-twitter">Twitter</a></li>
								<li><a href="#" class="fa-instagram">Instagram</a></li>
								<li><a href="#" class="fa-facebook">Facebook</a></li> -->
							</ul>
						</footer>
					</section>
                    <div>
                        <button><a href="./index.php">Refersh!</a></button>
                    </div><br>
                    <div style=" position: relative; float: right;">
                        
<form action="php/logout.php" method="post" id="frmLogout">
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>

                    </div>
				<!-- Footer -->
					<footer id="footer">
						<ul class="copyright">
							
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
	<!--		
<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(45.434046,12.340284),
    zoom:18,
    
  };
  var map = new google.maps.Map(mapCanvas,mapOptions);
  map.setTilt(100);
}
</script>
-->

<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);


if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(success, error);
} else {
    alert('location not supported');
}

//callbacks
function error(msg) {
    alert('error in geolocation');
}

	var lats = 13.3512934;
	var lngs = 74.79323200000002;
function success(position) {
     lats = position.coords.latitude;
     lngs = position.coords.longitude;
  //  alert(lats);
  //alert(lngs);
    var tempcord = [lats, lngs];
    return tempcord;
};

    // Multiple markers location, latitude, and longitude
    var markers = [
       ['My location', lats, lngs],
      	['Food Court', 13.346335, 74.794151],
        ['Caffeteria', 13.352028, 74.793178],
       ['Aditya Mess', 13.349235, 74.789686],
       ['Some far location', 12.349235, 73.789686],
       ['Some far location', 14.349235, 75.789686],
        ['MIT Canteen', 13.351227, 74.794204]
       
    ];
                        
    // Info window content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>ME</h3>' +
        '<p></p>' + '</div>'],
        ['<div class="info_content">' +
        '<h3>Food Court</h3>' +
        '<h5>Restaurant</h5>'+
        '<p>The ambience of this place is just amazing coupled with the quality food.</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(1)" >NOTIFY!</button>'+
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Caffeteria</h3>' +
        '<h5>Restaurant</h5>'+
        '<p>Decent food at affordable rates and the staff are friendly</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(2)">NOTIFY!</button>'+
        '</div>'],
         ['<div class="info_content">' +
        '<h3>Aditya Mess</h3>' +
        '<h5>Restaurant</h5>'+
        '<p>Varied options and low prices plus food quality is amazing</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(3)">NOTIFY!</button>'+
        '</div>'],

         ['<div class="info_content">' +
        '<h3>Unexplored location</h3>' +
        '<h5>Retail shop</h5>'+
        '<p>----</p>' +
        '</div>'],

         ['<div class="info_content">' +
        '<h3>Out of bounds</h3>' +
        '<h5>General Shop</h5>'+
        '<p>----</p>' +
        '</div>'],

        ['<div class="info_content">' +
        '<h3>MIT Canteen</h3>' +
        '<h5>Restaurant</h5>'+
        '<p>They offer rolls, baked cakes, samosas, puffs and coffee/tea </p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(4)">NOTIFY!</button>'+
        '</div>']
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            center: new google.maps.LatLng(13.3512934, 74.79323200000002),
            center: {lat: 13.3512934, lng: 74.79323200000002},
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(15);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
//google.maps.event.addDomListener(window, 'load', initMap);
</script>
<script>
function myFunction(x) {
      {
        location.href = "http://localhost:8888/angel/list"+x+".php";
    };
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9lkBzkJ4lG25vWAuD3tpNxVTywfNb5EA&callback=initMap"></script>

			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>
</html>