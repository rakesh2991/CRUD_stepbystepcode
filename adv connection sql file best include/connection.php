<?php
// note: error_reporting(0):error msg show nhi karta hai and mysqli_connection_error() error show kare ga
error_reporting(0);
$servername = "localhost";
$usernane = "root";
$password = "";
$dbname = "crud";

// multipal variable ko call karene ke liya , ka use hota hai
$conn = mysqli_connect($servername,$usernane,$password,$dbname);
if($conn)
{
    // echo "connection ok";
}
else
{
    // echo "connection fail";
    echo "connection fail".mysqli_connect_error();
}

?>