<?php
session_start();
?>
<?php
if(!empty($_POST["logout"])) {
	$_SESSION["username"] = "";
	session_destroy();
	 header('Location:../login.php');  
}
?>