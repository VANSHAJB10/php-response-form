<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("⚠ Connection to Database ❌Failed!❌ due to " .mysqli_connect_eror() );
    }
    echo "Successful connection to Db ✅"; 
?>