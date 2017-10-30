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
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$username=$_POST['username'];
$name=$_POST['name'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$query="INSERT into userinfo values('$name', '$username','$password', '$phone')";
if(!$username==""){
if(mysqli_query($conn,$query))
{
}
else
{
    echo"Some thing went wrong or already registered <br/>";
        echo '<a href="register.php">try again</a>';

}
    $query1="INSERT into login(uname, password, type) VALUES ( '$username','$password', 0)";
    if(mysqli_query($conn,$query1))
    {

    echo"Succesfully registered";
    header('Location:../login.php'); 
}else
{
    echo"Some thing went wrong or already registered <br/>";
        echo '<a href="register.php">try again</a>';

}

}?>