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
    $message = $_POST['message'];

     $sql = "INSERT INTO `Transaction Form`.`Transaction FORM` (`name`, `id`, `phone`, `email`, `message`) VALUES ('$name', '$id', '$phone', '$email', '$message', current_timestamp());";

     if($con->query($sql) == true){
        $insert = true;
      }
    else{
        echo "ERROR: $sql <br> $con->error";
      }

    $con->close();

    
    //Encryption of important data

    $key= 'vbecnkj4r78hvb3%#civ$nfir%09hfrj';
    function encrypt($data, $key){
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        //the algorithm aes-256-cbc will ensure randomness even if the same data is encrypted many times with the same key
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted . '::' . $iv);
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="formContainer">
        <h2>Hi</h2>
        <p> Enter your details for Confirmation!</p>
     
    <?php
        if($insert == true){
        echo "<p class='.submitMesssage'>Your Response is Recorded ✅</p>";
        }
    ?>

    <form actions = "index.php" method="post">
        <input type ="text" name ="name" palceholder ="Name">

        <input type ="number" name="id" placeholder="Id">

        <input type="number" name ="phone" placeholder="Phone Number">

        <input type="text" name="email" placeholder="Email Id">

        <textarea name="message" id="message" cols="15" rows="10" placeholder="Message"></textarea>

        <button class="btn" >Submit</button>
        <button class="btn" >Reset↺</button>

    </form>

    </div>
     
</body>
</html>