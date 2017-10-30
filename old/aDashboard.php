<?php
session_start();

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
        <style type="text/css">
            table, tr, td{
                padding: 5px;
                text-align: center;
            }
            table{
                margin-left: 18%;
            }
        </style>
    </head>
    <body class="is-loading">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <section id="login-main" style="min-width: 47em">
                    <div class="header-w3l">
            <h1 onclick="window.location='index.php';">Knowtify</h1>
        </div>
        <!--//header-->
        <!--main-->
        <div class="main-content-agile">
            <div class="sub-main-w3">   
                <h2>Admin Dashboard</h2>
                    <h3>Orders</h3>
<div id="product-grid">
    <div class="txt-heading"></div>
    <?php
    $uid = $_SESSION["uid"];

    $query="SELECT * FROM shop WHERE uid ='$uid'";
    $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["shopid"]=$row['sid'];
        $sid = $row['sid'];
    }
}
?>
<table><tr><th>Order ID</th><th>Item</th><th>Quantity</th><th>Price</th><th>Buyer</th></tr>
<?php
$query="SELECT * FROM order1 WHERE sid ='$sid'";
    $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['oid']."</td>"."<td>".$row['item']."</td>"."<td>".$row['quantity']."</td>"."<td>".$row['price']."</td>"."<td>".$row['uid']."</td></tr>";
    }
}
        
   ?>
</table>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <br>
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