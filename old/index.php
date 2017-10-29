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
  <title>Knowtify</title>
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

<div id="mapCanvas" style="width:100%;height:500px"></div>

<?php
        $dbhost="localhost";
        $dbname="knowtify";
        $dbuser="root";
        $dbpass="";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(mysqli_connect_errno()){
            die("database connection failed:".mysqli_connect_error()."(".mysqli_connect_errno().")");
        }
        $query="SELECT * FROM location";
        $result=mysqli_query($conn,$query);

        $coordsPHP = array();
        $lat = array();
        $long = array();
        $place = array();
        $k = 0;
if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
      
        $lat[$k] = $row["lat"];
        $long[$k] = $row["longi"];
        $place[$k] = $row["place"];
        
        $coordsPHP[$k][0] = $place[$k];
        $coordsPHP[$k][1] =  $lat[$k];
        $coordsPHP[$k][2] =  $long[$k];
        $k = $k +1;

    }
    
}

?>


<footer>
   <ul class="icons">

   </ul>
</footer>
</section>
<div>
    <button><a href="./index.php">Refersh!</a></button>
</div><br>
<div style=" position: relative; float: right;">

    <form action="php/logout.php" method="post" id="frmLogout">
        <span style="margin: 0 71px 1.5em 0;">Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div></span>
    </form>

</div>
<!-- Footer -->
<footer id="footer">
  <ul class="copyright">

  </ul>
</footer>

</div>


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
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
//callbacks
function error(msg) {
    alert('error in geolocation');
}
function showPosition(position) {
 lats = position.coords.latitude;
 lngs = position.coords.longitude; 

 function success(position) {
     lats = position.coords.latitude;
     lngs = position.coords.longitude;
  //alert(lats);
  //alert(lngs);
  var tempcord = [lats, lngs];
  return tempcord;
};
//fetching coords from the db
    



var markers = <?php echo json_encode( $coordsPHP ) ?>;
var mymarker = ['My location', lats, lngs];

    // Multiple markers location, latitude, and longitude
/*    var markers = [
    ['My location', lats, lngs],
    ['Food Court', 13.346335, 74.794151],
    ['Caffeteria', 13.352028, 74.793178],
    ['Aditya Mess', 13.349235, 74.789686],
    ['Some far location', 12.349235, 73.789686],
    ['Some far location', 14.349235, 75.789686],
    ['MIT Canteen', 13.351227, 74.794204]

    ];
*/
    // Info window content
    var myinfoWindowContent =['<div class="info_content">' +
    '<h3>ME</h3>' +
    '<p></p>' + '</div>']; 

    var infoWindowContent = [
    ['<div class="info_content">' +
    '<h3>'+markers[0][0]+'</h3>' +
    '<h5>Restaurant</h5>'+
    '<p>The ambience of this place is just amazing coupled with the quality food.</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(1)" >NOTIFY!</button>'+
    '</div>'],
    ['<div class="info_content">' +
    '<h3>'+markers[1][0]+'</h3>' +
    '<h5>Restaurant</h5>'+
    '<p>Decent food at affordable rates and the staff are friendly</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(2)">NOTIFY!</button>'+
    '</div>'],
    ['<div class="info_content">' +
    '<h3>'+markers[2][0]+'</h3>' +
    '<h5>Restaurant</h5>'+
    '<p>Varied options and low prices plus food quality is amazing</p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(3)">NOTIFY!</button>'+
    '</div>'],

    ['<div class="info_content">' +
    '<h3>'+markers[3][0]+'</h3>' +
    '<h5>Retail shop</h5>'+
    '<p>----</p>' +
    '</div>'],

    ['<div class="info_content">' +
    '<h3>'+markers[4][0]+'</h3>' +
    '<h5>General Shop</h5>'+
    '<p>----</p>' +
    '</div>'],

    ['<div class="info_content">' +
    '<h3>'+markers[5][0]+'</h3>' +
    '<h5>Restaurant</h5>'+
    '<p>They offer rolls, baked cakes, samosas, puffs and coffee/tea </p>'+'<p><h3>HOT OFFERS</h3><h3>Happy Hours</h3></p>'+'<button onclick="myFunction(4)">NOTIFY!</button>'+
    '</div>']
    ];

    var image = {
      url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
      };
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
//http://map-icons.com/ get icons from here**    
    //user location marker
    var position = new google.maps.LatLng(mymarker[1], mymarker[2]);
    bounds.extend(position);
    mymarker = new google.maps.Marker({
        position: position,
        map: map,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 10
        },
        center: new google.maps.LatLng(mymarker[1], mymarker[2]),
        center: {lat: lats, lng: lngs},
        title: mymarker[0]
    });
         // Add info window to marker    
         google.maps.event.addListener(mymarker, 'click', (function(mymarker, i) {
            return function() {
                infoWindow.setContent(myinfoWindowContent[0]);
                infoWindow.open(map, mymarker);
            }
        })(mymarker, 0));


    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            center: new google.maps.LatLng(mymarker[1], mymarker[2]),
            center: {lat: lats, lng: lngs},
            title: markers[i][0]
        });
        marker.addListener('click', toggleBounce);
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        function toggleBounce() {
           function drop() {
            for (var i = 1; i < markers.length; i++) {
              addMarkerWithTimeout(markers[i], i * 200);
          }
      }

      function addMarkerWithTimeout(position, timeout) {
        window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
            animation: google.maps.Animation.DROP
        }));
      }, timeout);
    }
}
        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(15);
        google.maps.event.removeListener(boundsListener);
    });
    
}}
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