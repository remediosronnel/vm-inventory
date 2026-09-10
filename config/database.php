<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "inventory_system";

$conn = mysqli_connect( $host, $username, $password, $database );

if(!$conn){
    die("Database Connection Failed: "
    . mysqli_connect_error());
}

?>