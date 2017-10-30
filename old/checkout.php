<?php
session_start();
?>
<?php
        $dbhost="localhost";
        $dbname="knowtify";
        $dbuser="root";
        $dbpass="";
        $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(mysqli_connect_errno()){
            die("database connection failed:".mysqli_connect_error()."(".mysqli_connect_errno().")");
        }
        ?>
<!DOCTYPE HTML>
<html>
    <head>

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
            <h1>Knowtify</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="sub-main-w3">   
                <h2></h2>
               <?php 
                    $sid = $_SESSION["sid"];
                    $item_total = $_SESSION["total"];
                    $uid = $_SESSION["username"]; 
      
    foreach ($_SESSION["cart_item"] as $item){
        $name = $item['name'];
        $qua = $item['quantity'];
        $price = $item['price'];
            $query="INSERT into order1(sid, item, quantity, price, uid) values('$sid', '$name', '$qua', '$price', '$uid')";
                if(mysqli_query($conn,$query))
                {
                }
                else
                {
                    echo "error ";
                }
        }
        ?>
        <input type="button" value='Pay <?php echo $item_total?>' onclick="window.location='index.php';">
        
        </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2017 Knowtify</p>
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