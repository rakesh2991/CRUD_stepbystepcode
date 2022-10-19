<?php
// note: error_reporting(0):error msg show nhi karta hai and mysqli_connection_error() error show kare ga
error_reporting(0);
$servername = "localhost";
$usernane = "root";
$password = "";
$dbname = "xyz_db";

// multipal variable ko call karene ke liya , ka use hota hai
$conn = mysqli_connect($servername,$usernane,$password,$dbname);
// $conn = mysqli_connect("localhost", "root", "", "xyz_db");  
if(!$conn)
{
    die("connection Failed");
}
echo "connection sucessfull <hr/>";

?>