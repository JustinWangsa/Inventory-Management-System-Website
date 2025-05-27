<?php
$db = mysqli_connect('localhost', 
                         'root', 
                         '', 
                         'inventory');


$username= $_POST['username'];
$password = $_POST['password'];

$sql = "select * from user where email = '$username' and password = '$password'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    require("./table.php");
} else {
    echo "<h1> Login Failed.</h1>";
}
?>