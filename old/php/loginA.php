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

$query="SELECT * FROM login WHERE uname='$username' AND password='$password' AND type='1'";
$result=mysqli_query($conn,$query);


if(mysqli_fetch_row($result))
    {
    echo "successful";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["uid"]=$row['uid'];

    }
}
        header('Location:../aDashboard.php');  
    }
else
    {
        echo "Wrong username or password or you're not seller<br/>";
        echo '<a href="../adminLogin.php">Click to go back</a>';
    }
        
?>