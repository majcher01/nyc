<?php
session_start();
if(!isset($_GET["pid"])){
    echo "nie wybrano produktu";
}else{


    $productid=$_GET["pid"];
    $email =$_SESSION['email'];
    
require_once "../connect.php";

$connection=mysqli_connect($host, $dbuser, $dbpass, $dbname);

if(!$connection){

die('Couldnt connect to database');

}

$koszykquery=mysqli_query($connection, "SELECT * FROM uzytkownicy WHERE email='$email'");
$koszyk=mysqli_fetch_array($koszykquery);

if($koszyk['koszyk']!=""){

if(strpos($koszyk['koszyk'], $productid)!==false){
header("Location: ../index.php?blad=Towar znajduje sie w koszyku!");

}else{

$toinsert=$koszyk['koszyk'].";".$productid;
mysqli_query($connection, "UPDATE `uzytkownicy` SET `koszyk`='$toinsert' WHERE email='$email'");

$connection->close();
header("Location: ../");
}

}else{
    $toinsert=$productid;
mysqli_query($connection, "UPDATE `uzytkownicy` SET `koszyk`='$toinsert' WHERE email='$email'");

$connection->close();
header("Location: ../");
}


}




?>