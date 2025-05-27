<?php

include('connect.php');

if (mysqli_connect_errno()) {
    echo "Can't connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['add'])) {

    $product_code = mysqli_real_escape_string($conn, $_POST['product_code']);
    $product_remarks = mysqli_real_escape_string($conn, $_POST['product_remarks']);
    $product_quantity = mysqli_real_escape_string($conn, $_POST['product_quantity']);

    $query = "INSERT INTO items (product_code, product_remarks, product_quantity)
              VALUES ('$product_code', '$product_remarks', '$product_quantity')";


    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Successfully stored');</script>";
    } else {
        echo "<script>alert('Something is wrong!');</script>";
    }
}

require('./table.php');

?>
