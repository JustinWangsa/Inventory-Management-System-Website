<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TKUISA Login</title>
  <link href="login.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <!-- Left Side -->
    <div class="left">
      <img src="src/image/logo.png" alt="TKUISA Logo" class="logo">
    </div>

    <!-- Right Side -->
    <div class="right">
      <h2>TKUISA</h2>
      <p>Welcome!<br><small>Please enter your details below</small></p>
      <form>
        <label for="id">ID</label>
        <input type="text" id="id" name="id" placeholder="Enter ID">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password">
        
          <a class="button" href="src/index.php">
           LOGIN
          </a>
      </form>
    </div>
  </div>
</body>
</html>

<?php 
session_start();
include 'src/connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    $sql = "select * from user where username='".$username."' AND password='".$password."'
            ";
    $result=mysqli_query($conn,$sql);

    $row=mysqli_fetch_array($result);

    if ($result && mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: src/index.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Username or Password');</script>";
    }
}


?>
<!--
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
-->