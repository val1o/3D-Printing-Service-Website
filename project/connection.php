<?php
//Create connection to server
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecomproject";

$conn = new mysqli($servername, $username, $password, $database);


//Test connection
if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}
echo "Connection succeeded";






?>