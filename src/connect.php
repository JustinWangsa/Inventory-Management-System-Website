<?php

$db = mysqli_connect('localhost', 
                     'root', 
                     '', 
                     'inventory');


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
