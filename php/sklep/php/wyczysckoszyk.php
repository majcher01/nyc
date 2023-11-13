<?php
session_start();


    $email =$_SESSION['email'];
    
require_once "../connect.php";

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');
}

mysqli_query($connection, "UPDATE `uzytkownicy` SET `koszyk`='' WHERE email='$email'");
$connection->close();

header("Location: ../profil.php?page=koszyk");







?>