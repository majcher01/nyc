<?php


if(!isset($_COOKIE['zalogowany'])){
    header("Location: ../index.php?blad=Zaloguj sie!");
}else{
require_once "../connect.php";
session_start();
$emailzsesji=$_SESSION['email'];

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}



mysqli_query($connection, "DELETE FROM `uzytkownicy` WHERE `uzytkownicy`.`email` = '$emailzsesji'");




$connection->close();


session_unset();
session_destroy();
setcookie("zalogowany", "", time() - 3600, "/");
header("Location: ../");
}

?>