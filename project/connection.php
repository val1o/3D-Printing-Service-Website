<?php

//Create connection to server
$servername = "localhost";
$username = "root";
$password = "";
$database = "3dprintmtl";

$conn = new mysqli($servername, $username, $password, $database);


//Test connection
if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

?>