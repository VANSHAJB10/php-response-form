<?php
$insert = false;
if(isset($_POST['name']))
{

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("⚠ Connection to Database ❌Failed!❌ due to " .mysqli_connect_eror() );
    }
    // echo "Successful connection to Db ✅"; 

    //POST Variables
    $name = $_POST['name'];
    $id = $_POST['id'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $ POST['message'];

     $sql = "INSERT INTO `Transaction Form`.`Transaction FORM` (`name`, `id`, `phone`, `email`, `message`) VALUES ('$name', '$id', '$phone', '$email', '$message', current_timestamp());";

     if($con->query($sql) == true){
        $insert = true;
      }
    else{
        echo "ERROR: $sql <br> $con->error";
      }
    $con->close();
}

?>