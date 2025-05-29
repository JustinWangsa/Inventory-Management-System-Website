<?php

include('connect.php');

if(isset($_GET['id'])){ // for check if ID is set
    $result = mysqli_query($conn, "DELETE FROM items WHERE id=" . $_GET['id']);
    if ($result == true){
        echo "<script>
                alert('Successfully Deleted');
                window.location.href = 'index.php';
            </script>"; 
        exit();
        }
    }
?>

