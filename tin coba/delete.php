<?php

    $db = mysqli_connect('localhost', 
                         'root', 
                         '', 
                         'opensource-final');
    if (mysqli_connect_errno()) {
        echo "Cant connect to MySQL:" . mysqli_connect_error();
    }

    #TUNGGU BER
    #get, delete, where, if success echo success;
?>