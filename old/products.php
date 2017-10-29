<?php
session_start();
?>

<!DOCTYPE HTML>
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
                    <section id="login-main" style="min-width: 47em">
                    <div class="header-w3l">
            
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="sub-main-w3">   
                <h2>Products</h2>
<?php $sid = $_GET['sid']; 

$dbhost="localhost";
        $dbname="knowtify";
        $dbuser="root";
        $dbpass="";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(mysqli_connect_errno()){
            die("database connection failed:".mysqli_connect_error()."(".mysqli_connect_errno().")");
        }
        $query="SELECT * FROM items where sid='$sid'";
        $result=mysqli_query($conn,$query);
        
        echo "<form><table><tr><th>Product</th><th>Description</th><th>Price</th><th>Quantity</th><th></th></tr>";
if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr><td>".$row['name']."</td><td>".$row['descp']."</td><td>".$row['value']."</td><td>"."<input type='number' name='qty' ></td><td></td></tr>";
        
    }
    
}
echo "</table><br><input type='submit' name='submit' value='Add to Cart'></form>";
?>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            
        </div>
        <!--//footer-->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<!-- //js -->
                        <footer>
                            <ul class="icons">
                        <!--        <li><a href="#" class="fa-twitter">Twitter</a></li>
                                <li><a href="#" class="fa-instagram">Instagram</a></li>
                                <li><a href="#" class="fa-facebook">Facebook</a></li> -->
                            </ul>
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