<?php

//GearHost credentials
$host = "mysql6.gear.host";
$dbname = "soen341team5";
$user = "soen341team5";
$password = "Lj2y30_b0!6k";

//connect to mysql databse
$con = mysqli_connect($host,$user,$password,$dbname);

//check is connection was successful
if(mysqli_errno($con)){
    echo "Failed to Connect ".mysqli_connect_error();
}else {
    echo "Connected";
}
?>