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
<?php

$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION["username"] =$_POST['username'];
$query="SELECT * FROM login WHERE uname='$username' AND password='$password'";
$result=mysqli_query($conn,$query);


if(mysqli_fetch_row($result))
    {
        echo "successful";
        header('Location:../index.php');  
    }
else
    {
        echo "Wrong username or password <br/>";
        echo '<a href="login.php">Click to go back</a>';
    }
        
?>