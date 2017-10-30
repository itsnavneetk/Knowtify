<?php
session_start();
error_reporting(0);
require_once("dbcontroller.php");
$db_handle = new DBController();
if($_GET['sid']){
    $sid = $_GET['sid'];    
    $_SESSION["sid"] = $sid;
}
    $sid = $_SESSION["sid"];
 

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM items WHERE code='" . $_GET["code"] . "'");
            $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["code"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);              
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
            }
        }
    break;
    case "empty":
        unset($_SESSION["cart_item"]);
    break;  
}
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="style.css" type="text/css" rel="stylesheet" />

        <link rel="stylesheet" href="assets/css/main.css" />
        
        <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
        <style type="text/css">
          div#wrapper {
    margin-left: 110%;
    margin-bottom: 40%;
}
table{
    color: black;
    padding-left: 5px;
    text-align: center;
}
tr, td, th{
    text-align: center;
    padding-left: 10px;
}input[type="number"] {
    color: black;
}strong {
    font-weight: bold;
}
        </style>
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
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="products.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>  
<table cellpadding="10" cellspacing="1" >
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>   
<?php       
    foreach ($_SESSION["cart_item"] as $item){
        ?>
                <tr>
                <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "₹".$item["price"]; ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
                </tr>
                <?php
        $item_total += ($item["price"]*$item["quantity"]);
        }
        ?>

<tr>
<td colspan="4" align=right><strong>Total:</strong> <?php echo "₹".$item_total; ?></td>
</tr>
</tbody>
</table>       
<?php $_SESSION["total"] = $item_total; ?>
<input type="submit" value="Proceed to Checkout" onclick="window.location='checkout.php';" style="float: right; margin: 10px; z-index: 33;"><br>
  <?php
}
?>
</div>

<div id="product-grid">
    <div class="txt-heading">Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM items where sid='$sid'");
    if (!empty($product_array)) { 
        foreach($product_array as $key=>$value){
    ?>
        <div class="product-item">
            <form method="post" action="products.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
            <div><?php echo $product_array[$key]["descp"]; ?></div>
            <div class="product-price"><?php echo "₹".$product_array[$key]["price"]; ?></div>
            <div><input type="number" name="quantity" value="1" size="2" style="width: 15%" /><input type="submit" value="Add to cart" class="btnAddAction" style="margin-left: 5px;" /></div>
            </form>
        </div>
    <?php
            }
    }
    ?>
    <input type="button" value="Back" onclick="window.location='index.php';">
</div>
  <div class="footer">
            <p>&copy; 2017 Knowtify</p>
        </div>
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