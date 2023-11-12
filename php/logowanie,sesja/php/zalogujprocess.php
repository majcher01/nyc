<?php

require_once "../connect.php";


$email=$_POST['email'];
$hasloplain=$_POST['password'];

$haslohash=sha1($hasloplain);


$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

$check=mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$email' AND haslo='$haslohash'");

if(mysqli_num_rows($check)>0){
    $connection->close();
    session_start();

setcookie("zalogowany", $email, time() + (1800), "/"); // 86400 = 1 day
$_SESSION["email"]=$email;
header("Location: ../");
}else{

    $connection->close();
    header("Location: ../zaloguj.php?blad=Bledne haslo lub email");
}


?>