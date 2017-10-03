<?php

include('phpqrcode/qrlib.php'); 
    

       $server="localhost";
        $unm="root";
        $pwd="dbpass";
        $db="angel";

        $con=new mysqli($server,$unm,$pwd,$db);
      if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$qry="SELECT * FROM gmaps where ID = 1 ";
    
$result = mysqli_query($con, $qry);
if (mysqli_num_rows($result) == 0) {
    echo "sorry";}
    else{
    while($row = mysqli_fetch_assoc($result)) {
        echo "</br>";
        
        $name = $row['name'];
        $lat = $row["lat"];
        $lng = $row["lng"];
        $ID = 1;
    }
}
     

    // we building raw data 
    $codeContents = '1: '.$name.'lat'.$lat.' lng :'.$lng; 
     
    // generating 
    QRcode::png($codeContents, 'qrcode1.png', QR_ECLEVEL_L, 3); 
    
    // displaying 
    

?>