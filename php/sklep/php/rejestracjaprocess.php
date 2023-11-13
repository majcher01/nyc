<?php

require_once "../connect.php";
$imie=$_POST['imie'];
$nazwisko=$_POST['nazwisko'];
$email=$_POST['email'];
$hasloplain=$_POST['password'];

$haslohash=sha1($hasloplain);

//echo $imie." ".$nazwisko." ".$email." ".$hasloplain;


$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

$checkemail=mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$email'");
if(mysqli_num_rows($checkemail)==0){

mysqli_query($connection, "INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `email`, `haslo`, `koszyk`) VALUES (NULL, '$imie', '$nazwisko', '$email', '$haslohash', '');");

$connection->close();

session_start();
setcookie("zalogowany", $email, time() + (1800), "/"); // 86400 = 1 day
$_SESSION["email"]=$email;
header("Location: ../");
}else{
    $connection->close();
    header("Location: ../rejestracja.php?blad=Podany email istnieje w bazie!");
}

?>