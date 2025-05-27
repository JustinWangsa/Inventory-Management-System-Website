<?php
$servername = "localhost";
$username = "root";       
$password = "";           
$dbname = "inventory";       

$conn = new mysqli($servername, $username, $password, $dbname);

echo'if you see this the connection is good';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
