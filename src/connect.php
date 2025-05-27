<?php

$db = mysqli_connect('localhost', 
                         'root', 
                         '', 
                         'inventory');
$conn = new mysqli($servername, $username, $password, $dbname);

echo'if you see this the connection is good';

if ($conn->connect_error) {
    echo'yg bener jing';
    die("Connection failed: " . $conn->connect_error);
}
?>
